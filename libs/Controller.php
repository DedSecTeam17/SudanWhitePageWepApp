<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 28/11/2018
     * Time: 00:05
     */

    class Controller
    {

        public function __construct($model_name = '')
        {
            $this->view = new View();

            $modelName=$this->loadModel($model_name);
            $this->model=new $modelName();
        }









        public function middleWare($user_type)
        {
            if ($user_type==='Auth')
            {
                if (!Auth::getInstance()->isAuthenticated()) {
                    Route::redirectTo(Route::to('index', 'HomeController', null, false));
                }
            }else if ('quest')
            {
                Route::redirectTo(Route::to('index', 'HomeController', null, false));

            }
        }












        function loadModel($model_name)
        {
            if (file_exists('models/' . $model_name . '.php')) {
                require 'models/' . $model_name . '.php';
                return $model_name;
            }else
            {
                return 'file dose not exist ';
            }
        }


        public function getPostRequestData($filed_name)
        {
            $sanitizer = new Sanitizer();
            return $sanitizer->sanitizeString($_POST[$filed_name]);
        }


        public  function  getGetRequestData($filed_name){
            $sanitizer = new Sanitizer();
            return $sanitizer->sanitizeString($_GET[$filed_name]);
        }


    }