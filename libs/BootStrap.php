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


            $url = isset($_GET['url']) ? $_GET['url'] : null;

            $url = rtrim($url, '/');

            $url = explode('/', $url);


//            echo print_r($url);


//            check if first array item is empty or not if empty redirect to index file

            if (empty($url[0])) {
                require 'controllers/HomeController.php';

                $index = new HomeController();
                $index->index();
            } else {

                // we get the main controller out there <3

                $file = 'controllers/' . $url[0] . '.php';

                if (file_exists($file)) {
                    require $file;
                    $controller = new $url[0];

                    if (isset($url[1])) {
//     function name to be executed
                        if (isset($url[2])) {
                            $controller->{$url[1]}($url[2]);
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

    }