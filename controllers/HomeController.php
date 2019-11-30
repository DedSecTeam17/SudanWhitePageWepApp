<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 01/12/2018
 * Time: 11:27
 */


require 'models/PhoneBook.php';
require 'models/Profile.php';
require 'models/User.php';


/**
 * Class HomeController
 */
class HomeController extends Controller
{


    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        Auth::getInstance()->user();

        Parent::__construct();
//            $this->middleWare('Auth', []);


    }

    /**
     * @return mixed
     * this page allow user to see all contacts with ability to search fir specific order them by creation date
     */
    public function home()
    {


        $q = !is_null($this->getGetRequestData("q")) ? $this->getGetRequestData("q") : null;
        $instance = new PhoneBook();

        $contacts = array();


        if ($q != null) {
            $contacts = $instance->select(['*'], null)->where([
                array('name', 'LIKE', '%' . $q . '%')
            ])->
            orderBy('name', 'asc')->getAll();
        } else {
            $contacts = $instance->select(['*'], null)->
            orderBy('name', 'asc')->getAll();
        }


        $contacts_with_creatorInfo = array();


        foreach ($contacts as $contact) {


            $profile_instance = new Profile();
            $user_instance = new User();

            $profile_by_contact = $profile_instance->select(["*"], null)->where([array(
                'user_id', '=', $contact->user_id
            )])->get();

            $user_by_profile = $user_instance->find($profile_by_contact->user_id);


            $object = (object)[
                'author_image' => $profile_by_contact->image_url,
                'author_name' => $user_by_profile->name,
                "name" => $contact->name,
                "number" => $contact->number,
                "create_at" => $contact->create_at,
                "id" => $contact->id
            ];

            array_push($contacts_with_creatorInfo, $object);
        }

        return $this->view->render('pages.home', $contacts_with_creatorInfo);
    }


    /**
     *search for specif item order by creation date
     */
    public function search()
    {


        $q = $this->getGetRequestData("q");

        $instance = new PhoneBook();

        $contacts = $instance->select(['*'], null)->where([
            array('name', 'LIKE', '%' . $q . '%')
        ])->
        orderBy('name', 'desc')->getAll();

        $contacts_with_creatorInfo = array();


        foreach ($contacts as $contact) {


            $profile_instance = new Profile();
            $user_instance = new User();

            $profile_by_contact = $profile_instance->select(["*"], null)->where([array(
                'user_id', '=', $contact->user_id
            )])->get();

            $user_by_profile = $user_instance->find($profile_by_contact->user_id);


            $object = (object)[
                'author_image' => $profile_by_contact->image_url,
                'author_name' => $user_by_profile->name,
                "name" => $contact->name,
                "number" => $contact->number,

                "id" => $contact->id
            ];

            array_push($contacts_with_creatorInfo, $object);
        }


        print_r($contacts_with_creatorInfo);
//        return $this->view->render('pages.index' , $contacts_with_creatorInfo );
    }







    /**
     * @return mixed
     * show user about page include data related to sudan white page
     */
    public function about()
    {
        return $this->view->render('pages.about');

    }


    /**
     * @return mixed
     */
    public function index()
    {
        return $this->view->render('pages.index');

    }


}