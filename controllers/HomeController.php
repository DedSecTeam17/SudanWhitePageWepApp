<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 01/12/2018
     * Time: 11:27
     */




    require  'models/PhoneBook.php';
require  'models/Profile.php';
require  'models/User.php';


class HomeController extends Controller
    {


        public function __construct()
        {
            Parent::__construct();
        }

        public function index()
        {

            $q = !is_null($this->getGetRequestData("q")) ?  $this->getGetRequestData("q") : null;
            $instance = new PhoneBook();

            $contacts =array();



            if ($q!=null) {
                $contacts = $instance->select(['*'], null)->where([
                    array('name' , 'LIKE' , '%'.$q.'%')
                ])->
                orderBy('create_at', 'desc')->getAll();
            }else {
                $contacts  = $instance->select(['*'], null)->
                orderBy('create_at', 'desc')->getAll();
            }




            $contacts_with_creatorInfo = array();



            foreach ($contacts  as $contact){


                $profile_instance= new Profile();
                $user_instance= new User();

                $profile_by_contact=  $profile_instance->select(["*"],null)->where([array(
                    'user_id' , '=' , $contact->user_id
                )])->get();

                $user_by_profile= $user_instance->find($profile_by_contact->user_id);


                $object = (object) [
                    'author_image' => $profile_by_contact->image_url,
                    'author_name' => $user_by_profile->name,
                    "name" =>$contact->name,
                    "number" =>$contact->number,
                    "create_at"=>$contact->create_at,
                    "id" =>$contact->id
                ];

                array_push($contacts_with_creatorInfo , $object);
            }

            return $this->view->render('pages.index' , $contacts_with_creatorInfo );
        }









    public function search()
    {



        $q = $this->getGetRequestData("q");

        $instance = new PhoneBook();

        $contacts = $instance->select(['*'], null)->where([
            array('name' , 'LIKE' , '%'.$q.'%')
        ])->
        orderBy('id', 'desc')->getAll();

        $contacts_with_creatorInfo = array();



        foreach ($contacts  as $contact){


            $profile_instance= new Profile();
            $user_instance= new User();

            $profile_by_contact=  $profile_instance->select(["*"],null)->where([array(
                'user_id' , '=' , $contact->user_id
            )])->get();

            $user_by_profile= $user_instance->find($profile_by_contact->user_id);


            $object = (object) [
                'author_image' => $profile_by_contact->image_url,
                'author_name' => $user_by_profile->name,
                "name" =>$contact->name,
                "number" =>$contact->number,

                "id" =>$contact->id
            ];

            array_push($contacts_with_creatorInfo , $object);
        }


        print_r($contacts_with_creatorInfo);
//        return $this->view->render('pages.index' , $contacts_with_creatorInfo );
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