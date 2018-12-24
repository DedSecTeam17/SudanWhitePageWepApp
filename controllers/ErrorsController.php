<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 27/11/2018
 * Time: 23:58
 */

class ErrorsController extends  Controller
{



    public function __construct()
    {
       Parent::__construct();
    }


    public  function  err(){
        return $this->view->render('errors.error');
    }

}