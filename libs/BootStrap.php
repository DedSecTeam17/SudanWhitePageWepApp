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
//            echo  $url;

            $url = rtrim($url, '/');

            $url = explode('/', $url);


//            echo print_r($url);


//            check if first array item is empty or not if empty redirect to index file

//            method not passed to url redirect to home page
            if (empty($url[0])) {
                require 'controllers/HomeController.php';
                $index = new HomeController();
                $index->index();
            } else {

                // we get the main controller out there <3


//                get controller file
                $file = 'controllers/' . $url[0] . '.php';

                if (file_exists($file)) {
//                    make controller required
                    require $file;
//                    init controller class

                    $controller = new $url[0];


//                    check if we have function on the controller
                    if (isset($url[1])) {
//     function name to be executed
//                        check if we have params after the function
                        if (isset($url[2])) {
//                            pass params to controller
                            $controller->{$url[1]}($url[2]);
                        } else {
//                            no params pass noting
                            $controller->{$url[1]}();

                        }
                    }
                } else {
//                    file not found then require error controller
                    require 'controllers/ErrorsController.php';

//                    create instance from error controller
                    $err = new ErrorsController();
//                    show error
                    $err->err();

                }

            }

        }

    }