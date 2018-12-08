<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 01/12/2018
     * Time: 11:27
     */

    class IndexController extends  Controller
    {


        public function __construct()
        {
            Parent::__construct();
        }


        public function  index(){
            return $this->view('index.index');
        }

    }