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

            $validation_result = $this->validator->validate([
                $this->getPostRequestData('email') => 'email',
                $this->getPostRequestData('password') => 'min:6|max:12'
            ] , ['email' , 'password'])->execute();

            if ($validation_result->getisValid()) {
                $user = new User();

                $id = $user
                    ->select(['id'], null, null)
                    ->where([['email', '=', $this->getPostRequestData('email'), '&&'], ['password', '=', Hash::passwordHashing($this->getPostRequestData('password'))]])->get();
                if ($id > 0) {

                    Auth::getInstance()->authenticateNewUser($id);
                    Cookie::setLatTime();


                    Route::redirectTo(
                        Route::to('index', 'HomeController', null, false));
                }else {
                    $error = "Email or password wrong";
                    return $this->view->render('auth.login', $error);
                }

            } else {
                $error = $validation_result->getMessage();
                return $this->view->render('auth.login', $error);
            }
        }

        function registerStore()
        {
            $validation_result = $this->validator->validate([
                $this->getPostRequestData('email') => 'email',
                $this->getPostRequestData('name') => 'string|min:6',
                $this->getPostRequestData('password') => 'string|min:6'
            ] ,['email' ,'name' ,'password'])->execute();

            if ($validation_result->getisValid()) {
                $user = new User();
                $user->columns['name'] = $this->getPostRequestData('name');
                $user->columns['email'] = $this->getPostRequestData('email');
                $user->columns['password'] = Hash::passwordHashing($this->getPostRequestData('password'));
               if ( $user->insert()) {
                   Route::redirectTo(
                       Route::to('getLogin', 'AuthController', null, false));
               }else {
                               return $this->view->render('auth.register', "Email already used");

               }


            } else {
//                echo $validation_result->getMessage();
                return $this->view->render('auth.register' , $validation_result->getMessage());


            }


        }


        public function getLogOut()
        {
            Auth::getInstance()->logout();
            return Route::redirectTo(
                Route::to('getLogin', 'AuthController', null, false));

        }


    }

