<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 02/12/2018
     * Time: 09:52
     */

    class Hash
    {

        public static function create($algo, $data, $salt)
        {
            $context = hash_init($algo, HASH_HMAC, $salt);
            hash_update($context, $data);
            return hash_final($context);
        }

        public  static  function  passwordHashing($password){
            return md5($password);
        }


    }