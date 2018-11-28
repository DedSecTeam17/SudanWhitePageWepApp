<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 27/11/2018
 * Time: 23:50
 */

class BootStrap
{

    public function __construct()
    {


    }


    function _init()
    {

// explode will explode it to an array the first post
// is is the controller name and second one is the
// method inside the controller

        $trimedUrl = rtrim($_GET['url'], '/');

        $url = explode('/', $trimedUrl);

//        echo print_r($url);


// we get the main controller out there <3

        $file = 'controllers/' . $url[0] . '.php';

        if (file_exists($file)) {
            require $file;
            $controller = new $url[0];

            if (isset($url[1])) {
//     function name to be executed
                if (isset($url[2])) {
                    $controller->{$url[1]}($url);
                } else {
                    $controller->{$url[1]}();

                }
            }
        } else {
            require 'controllers/ErrorsController.php';

            $err = new ErrorsController();

        }


    }

}