<?php

define('URL', '/server_projects/sudan_white_page/');


define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'sudan_white_page');
define('DB_USER', 'root');
define('DB_PASS', '');

class Route
{


    static function to($where, $controller_name, $params, $there_is_params = false)
    {
        return $there_is_params ? URL . $controller_name . '/' . $where . '/' . $params : URL . $controller_name . '/' . $where;
    }


    static function redirectTo($location)
    {
        return header('Location: ' . $location);

    }

//?pollid=$pollids&chid=$choiceid"
    static function redirectToWithPrams($location, $params)
    {


//        header('HTTP/1.1 307 Temporary Redirect');
        header('Location: ' . $location . "?id=$params");

    }


}

?>