<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 01/12/2018
     * Time: 12:05
     */


    class AuthController extends Controller
    {


        public function __construct()
        {
            Parent::__construct('User');

        }


        function getLogin()
        {
            return $this->view->render('auth.login');
        }


        function getRegister()
        {
            return $this->view->render('auth.register');
        }

        function loginStore($args = false)
        {

            $user = new User();
            $user->setEmail($this->getPostRequestData('email'));
            $user->setPassword($this->getPostRequestData('password'));
            $user->setId($user->login($user));




            if ($user->getId()> 0)
            {
                Auth::getInstance()->authenticateNewUser($user);


                return Route::redirectTo(
                    Route::to('index','PhoneController',null,false));

            }else{
                return Route::redirectTo(
                    Route::to('getLogin','AuthController',null,false));

            }


        }

        function registerStore()
        {
            $user = new User();
            $user->setEmail($this->getPostRequestData('email'));
            $user->setFullName($this->getPostRequestData('name'));
            $user->setPassword(Hash::passwordHashing($this->getPostRequestData('password')));
            $user->save($user);
            return $this->view->render('pages.index');

        }


        public  function  getLogOut(){
            Auth::getInstance()->logout();
            return Route::redirectTo(
                Route::to('index','PhoneController',null,false));

        }


    }

