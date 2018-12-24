<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 12/12/2018
     * Time: 06:33
     */

    require_once 'config/env.php';

    class  SoftMapper
    {

        /*PDO PHP DATA ----> instance for data base operations*/
        /**
         * @var PDO
         */
        private $pdo;
        /*specify the initial query for complex one*/
        /**
         * @var string
         */
        private $builded_query = 'SELECT * FROM ';


        /*specify selected columns selected by select fuction */
        /**
         * @var string
         */
        private $selected_columns = '';
        /*specify value for columns that used by prepared statement*/
        /**
         * @var
         */
        private $query_columns_place_holder_array;
        /*specify model for data */
        /**
         * @var
         */
        public $table_name;
        /*specify entity columns*/
        /**
         * @var
         */
        public $columns;
        /**
         * @var
         */
        public $fullAble;


        /**
         * @var bool
         */
        private $update_switch = false;
        /**
         * @var bool
         */
        private $in_switch = false;


        /**
         * DataBaseHandler constructor.
         * @param string $host
         * @param $dbname
         * @param $user
         * @param $password
         */
        public function __construct()
        {
            /*data source name for php to know about data base tech and user data */
            $dsn = 'mysql:host=' . host . ';dbname=' . dbname;
            /*PDO initialization*/
            $this->pdo = new PDO($dsn, user, password);
        }

        /**
         * @return $this
         * TODO:get all rows from table
         */
        public function all()
        {
            $this->builded_query .= $this->table_name;
            return $this;
        }

        /**
         * @param $table
         * @param array $columns
         * @param string $aggregate_function
         * @param string $aggregate_parameter
         * @return $this
         * TODO:select  raws from table with aggregate functions as option parameter
         */
        public function select($columns = array(), $aggregate_function = '', $aggregate_parameter = null)
        {

//            reset old query for selection
            $this->builded_query = '';
//            update with select
            if (isset($columns)) {
                $this->selected_columns .= implode(',', $columns);
                if (isset($aggregate_function))
                    $this->builded_query .= 'SELECT' . "\t" . $this->selected_columns . ",\t" . $aggregate_function . '(' . $aggregate_parameter . ')' . "\t FROM \t" . $this->table_name;
                else
                    $this->builded_query .= 'SELECT' . "\t" . $this->selected_columns . "\t FROM \t" . $this->table_name;
            } else {
                if (isset($aggregate_function))
                    $this->builded_query .= 'SELECT' . "\t" . $aggregate_function . '(' . $aggregate_parameter . ')' . "\t FROM \t" . $this->table_name;

            }
            $this->builded_query;

            return $this;
        }

        /**
         * @return array
         * TODO:THIS METHOD FALLOWED WITH MOST METHODS INCLUDED HERE TO EXECUTE GENERATED QUERY
         */
        public function getAll()
        {
            $stmt = $this->pdo->prepare($this->builded_query);
            $stmt->execute($this->query_columns_place_holder_array);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        /**
         * @return mixed
         */
        public function get()
        {
            $stmt = $this->pdo->prepare($this->builded_query);
            $stmt->execute($this->query_columns_place_holder_array);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        /**
         * @return bool
         */
        public function execute()
        {
            $stmt = $this->pdo->prepare($this->builded_query);
            $result = $stmt->execute($this->query_columns_place_holder_array);
            return $result;
        }


        /**
         * @param array $conditions
         * @return $this
         * TODO:add many or once condition for your built query
         */
        public function where($conditions = array())
        {

            $this->query_columns_place_holder_array = array();

            $where_query = "\t" . 'where' . "\t";

            for ($i = 0; $i < sizeof($conditions); $i++) {
                $values = $conditions[$i];
                $index = $values[0];
                $this->query_columns_place_holder_array[$index] = $values[2];
                if (isset($values[3]))
                    $where_query .= "\t" . $values[0] . $values[1] . ' :' . $values[0] . "\t" . $values[3];
                else
                    $where_query .= "\t" . $values[0] . $values[1] . ' :' . $values[0];
            }
            $this->builded_query .= $where_query;



            if ($this->update_switch) {
                $keys = array_keys($this->columns);
                $values = array_values($this->columns);
//                add update data to be added to prepared statment
                for ($i = 0; $i < sizeof($this->columns); $i++)
                    $this->query_columns_place_holder_array['UP_' . $keys[$i]] = $values[$i];
                print_r($this->query_columns_place_holder_array);
            }

            return $this;
        }

        /**
         * @param $column_name
         * @param $ordering_type
         * @return $this
         * TODO:add condition to query to be ordered with  [ascending or descending]order
         */
        public
        function orderBy($column_name, $ordering_type)
        {
            $this->builded_query .= "\t" . 'order by' . "\t" . $column_name . "\t" . $ordering_type;
            return $this;
        }

        /**
         * @param $limitation_number
         * @return $this
         * TODO:limit numbers of selected row
         */
        public
        function limit($limitation_number)
        {
            $this->builded_query .= "\t" . 'LIMIT' . "\t" . $limitation_number;
            return $this;
        }


        /**
         * @param $grouper
         * @return $this
         * TODO:used with aggregated function to group some of raw and process  functions on it
         */
        public
        function groupBy($grouper)
        {
            $this->builded_query .= "\t group by \t" . $grouper;
//            echo  $this->builded_query;
            return $this;
        }

        /**
         * @param array $conditions
         * @return $this
         * TODO:used as condition for aggregates functions
         */
        public
        function having($conditions = array())
        {

            $this->query_columns_place_holder_array = array();
            $having_query = "\t" . 'HAVING' . "\t";
            for ($i = 0; $i < sizeof($conditions); $i++) {
                $values = $conditions[$i];
                $index = $values[0];
                $this->query_columns_place_holder_array[$index] = $values[2];
                if (isset($values[3]))
                    $having_query .= "\t" . $values[0] . $values[1] . ' :' . $values[0] . "\t" . $values[3];
                else
                    $having_query .= "\t" . $values[0] . $values[1] . ' :' . $values[0];
            }
            $this->builded_query .= $having_query;

            return $this;
        }


//


        /**
         *TODO:insert data
         */
        public function insert()
        {
            $columns = array_keys($this->columns);
            $values_indicator = array();
            for ($i = 0; $i < sizeof($columns); $i++) {
                array_push($values_indicator, ':' . $columns[$i]);
            }
            $values_pointers = implode(',', $values_indicator);
            $columns_name = implode(',', $columns);
            $query = 'INSERT INTO ' . $this->table_name . "\t" . '(' . $columns_name . ') ' . "values (" . $values_pointers . ')';
            $stmt_insert = $this->pdo->prepare($query);
            $insert_a_row = $stmt_insert->execute($this->columns);
            return $insert_a_row;
        }

        /**
         * @param $key
         * @return mixed
         */
        public function find($key)
        {
            return $result = $this->all()->where([['id', '=', $key]])->get();
        }


        /**
         *TODO:delete data
         */

        public function delete()
        {
            $this->builded_query = "DELETE  FROM\t" . $this->table_name;
            return $this;
        }


        /**
         *TODO:update data
         */

        public function update()
        {
            $keys = array_keys($this->columns);
            $values = array_values($this->columns);
            $keys_for_prepare = array();
            for ($i = 0; $i < sizeof($keys); $i++) {
                array_push($keys_for_prepare, $keys[$i] . "=:" . 'UP_' . $keys[$i] . "\t");
            }
            $query = 'UPDATE  ' . $this->table_name . "\t" . 'SET ' . implode(',', $keys_for_prepare);
            $this->builded_query = $query;
            $this->update_switch = true;
            return $this;
        }


//        relations


        /**
         * @param $joined_table
         * @param array $table_condition
         * @return array
         */
        public function hasMany($joined_table, $table_condition = array())
        {

            $joined_table_class = new $joined_table();
            $column_arr = array();

            for ($i = 0; $i < sizeof($joined_table_class->fullAble); $i++) {
                array_push($column_arr, strtolower($joined_table) . '.' . $joined_table_class->fullAble[$i]);

            }

            $selected_columns = implode(',', $column_arr);
            print_r($selected_columns);

            $this->builded_query = 'SELECT ' . $selected_columns . ' FROM ';

            $this->builded_query .= "\t" . $this->table_name . "\t" . "cross join \t" . strtolower($joined_table) . "\t" . 'on ' . $this->table_name . '.' . $table_condition[0] . "=" . strtolower($joined_table) . '.' . $table_condition[1];
            $stmt = $this->pdo->prepare($this->builded_query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
//        serialize

        /**
         * @param array $data
         */
        public function jsonSerialize(array $data)
        {

        }


        /**
         * @param array $data
         */
        public function xmlSerialize(array $data)
        {


        }


    }
