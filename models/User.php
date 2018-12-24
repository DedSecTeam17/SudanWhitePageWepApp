<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 02/12/2018
     * Time: 03:29
     */

    class User extends Model
    {

        public $table_name='users';
        public $fullAble=['id','name','email','password'];


        public function __construct()
        {
            Parent::__construct();
        }

    }