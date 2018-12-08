<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 02/12/2018
     * Time: 06:01
     */

    class Sanitizer
    {


        public  function sanitizeString($data)
        {
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $data = $conn->real_escape_string($data);
            $data = self::removeHtmlStuff($data);
            return $data;
        }


        public  function removeHtmlStuff($data)
        {
            $data = stripslashes($data);
            $data = htmlentities($data);
            $data = strip_tags($data);

            return $data;
        }


    }