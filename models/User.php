<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 02/12/2018
     * Time: 03:29
     */

    class User extends Model
    {


        private $full_name;
        private $email;
        private $password;
        private  $id;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }



        /**
         * User constructor.
         * @param $full_name
         * @param $email
         * @param $password
         */
        public function __construct()
        {
            Parent::__construct();
        }

        /**
         * @param mixed $full_name
         */
        public function setFullName($full_name)
        {
            $this->full_name = $full_name;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }




        /**
         * @return mixed
         */
        public function getFullName()
        {
            return $this->full_name;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }


        public  function  getUser($id){


            $result= $this->db->select("select * from users where  id='$id'  ");


            $users_list = array();
            foreach ($result as $key => $value) {
                $user = new User();
                $user->setFullName($value['name']);
                $user->setEmail($value['email']);
                $user->setId($value['id']);
                array_push($users_list, $user);
            }


            return $users_list[0];

        }

        public function save(User $user)
        {
            $this->db->insert('users', array(
                'name' => $user->getFullName(),
                'email' =>$user->getEmail(),
                'password' => $user->getPassword()// use GMT aka UTC 0:00
            ));
        }


        public function  login(User $user){

            $sth = $this->db->prepare("SELECT *  FROM users WHERE 
                email = :email AND password = :password");
            $sth->execute(array(
                ':email' => $user->getEmail(),
                ':password' => Hash::passwordHashing($user->getPassword())
            ));

            $data = $sth->fetch();

            $count =  $sth->rowCount();
            if ($count > 0) {
                // login


                return $data['id'];
            } else {
                return 0;
            }

        }


    }