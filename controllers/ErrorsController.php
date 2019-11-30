<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 27/11/2018
 * Time: 23:58
 */

class ErrorsController extends  Controller
{


    /**
     * ErrorsController constructor.
     */
    public function __construct()
    {
       Parent::__construct();
    }



//    show

    /**
     * @return mixed
     * show error to user say that page not found
     */
    public  function  err(){
        return $this->view->render('errors.error');
    }

}