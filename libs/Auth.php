<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 02/12/2018
     * Time: 10:13
     */


    require 'Session.php';


    class Auth extends Session
    {


        private static $instance;


        private function __construct()
        {
            self::init();
        }


        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new Auth();
            }
            return self::$instance;
        }

        /* this function return true if current user already registered in the system */
        public function isAuthenticated()
        {
            return isset($_SESSION['id']);
        }


        /*this method set new session for new user */
        public function authenticateNewUser(User $user)
        {
            self::set('id', $user->getId());
            self::set('loggedIn', true);
            self::set('email', $user->getEmail());
        }


        /*this  function destroy user session to be directed  to main page */
        public function logout()
        {
            self::destroy();
        }


        /*this function connected with User model if it exist and return user get it by session id */
        public function user()
        {
            if (file_exists('models/User.php')) {
                require 'models/User.php';
                $model = new User();
                $session_key = self::get('id');
                return $model->getUser($session_key);
            } else {
                return 'this file it,s not exist';
            }
        }
    }