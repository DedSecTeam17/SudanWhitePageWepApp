<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 01/12/2018
     * Time: 11:27
     */


    class HomeController extends Controller
    {


        public function __construct()
        {
            Parent::__construct();
        }

        public function index()
        {
            return $this->view->render('pages.index');
        }

        public function about()
        {
            return $this->view->render('pages.about');

        }

        public function contactUs()
        {
            return $this->view->render('pages.contactUs');

        }

        public  function  home(){
            $this->middleWare('Auth');
            return $this->view->render('pages.home');

        }

    }