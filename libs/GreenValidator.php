<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 16/12/2018
     * Time: 04:53
     */


    require_once 'Validation.php';

    class GreenValidator
    {
        
//        ^ start with
        private $validation_result = array();

        public function __construct()
        {
        }


        public function isNumber($num)
        {
            return preg_match('/^[0-9]+$/', $num);
        }

        public function isFloat($float)
        {
            return filter_var($float, FILTER_VALIDATE_FLOAT);
        }


        public function isEmail($email)
        {

            return preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email);
        }

        public function isStringOnly($str)
        {
            return preg_match("/^[a-zA-Z0-9 ]+$/", $str);
        }

//    /[^a-zA-Z0-9 ]/

        public function max($data, $max)
        {
            return strlen($data) <= $max ? true : false;
        }

        public function min($data, $min)
        {
            return strlen($data) >= $min ? true : false;
        }

        public function validate($requests = array() , $labels=array())
        {
            $keys = array_keys($requests);
            $values = array_values($requests);
//
            $max = array();
            $min = array();
//
            for ($i = 0; $i < sizeof($keys); $i++) {
//    data came from form need to validated
                $data = $keys[$i];
                $hints_lab=$labels[$i];
                $arr = explode('|', $values[$i]);
                for ($z = 0; $z < sizeof($arr); $z++) {
                    if (preg_match('/min/', $arr[$z])) {
                        $min = explode(':', $arr[$z]);
                        $min_value = $min[1];
                        $this->min($data, $min_value)
                            ?: array_push($this->validation_result, $hints_lab . "\t" . ' must be at least equal or greater then ' . $min_value);
                    } else if (preg_match('/max/', $arr[$z])) {
                        $max = explode(':', $arr[$z]);
                        $max_value = $max[1];
                        $this->max($data, $max_value)
                            ?:
                            array_push($this->validation_result, $hints_lab . "\t" . ' must be at least equal or less then ' . $max_value);

                    }else
//                    email validation
                    if ($arr[$z] === 'email') {
                        $this->isEmail($data)
                            ?: array_push($this->validation_result, $hints_lab . "\t" . ' invalid email');

                    } //                    string validation
                    else if ($arr[$z] === 'string') {
                        $this->isStringOnly($data)
                            ?: array_push($this->validation_result, $hints_lab . "\t" . 'invalid string');
                    } //                    number s validations
                    else if ($arr[$z] === 'number') {
                        $this->isNumber($data)
                            ?: array_push($this->validation_result, $hints_lab . "\t" . 'invalid number');
                    } //                    float validation
                    else if ($arr[$z] === 'float') {
                        $this->isFloat($data)
                            ?: array_push($this->validation_result, $hints_lab . "\t" . 'invalid float');
                    }
                }

            }


            return $this;

        }


        public function execute(): Validation
        {
            $validation = new Validation();

            $message = '';

            if (sizeof($this->validation_result) > 0) {
                for ($i = 0; $i < sizeof($this->validation_result); $i++) {
                    $message .= $this->validation_result[$i] . '<br>';
                }
            } else {
                $validation->setIsValid(true);

            }
            $validation->setMessage($message);


            return $validation;
        }

    }







