<?php
require 'models/PhoneBookImages.php';
require 'models/Profile.php';
require 'models/User.php';


class PhoneBookController extends Controller
{
    public function __construct()
    {
        Parent::__construct('PhoneBook');
        $this->middleWare('Auth', ["show"]);

    }


    public function index()
    {

        $contacts = new PhoneBook();

        $data = $contacts->select(['*'], null)->where([array("user_id", "=", Auth::getInstance()->user()->id)])->
        orderBy('id', 'desc')->getAll();


        return $this->view->render('phone_book.index', $data);
    }

    public function create()
    {
        return $this->view->render('phone_book.create');

    }

    public function show()
    {


//       echo  $new;

        $id = $this->getGetRequestData('id');
        $contact = new PhoneBook();
        $profile = new Profile();
        $user = new User();
        $images = new PhoneBookImages();


        $selectedPhoneBook = $contact->find($id);
        $selectedUser = $user->find($selectedPhoneBook->user_id);

        $selectedProfile = $profile->select(['*'], null)->where([array('user_id', '=', $selectedPhoneBook->user_id)])->get();
        $selectedImages = $images->select(['image_url'], null)->where([array('phone_book_id', '=', $selectedPhoneBook->id)])->getAll();


        return $this->view->render('phone_book.show', [
            "profile" => $selectedProfile,
            "images" => $selectedImages,
            "contact" => $selectedPhoneBook,
            "user" => $selectedUser,
            "is_current_user" => !empty(Auth::getInstance()->user()) ? Auth::getInstance()->user()->id == $selectedPhoneBook->user_id : false
        ]);

    }

    public function store()
    {


        $validation_result = $this->validator->validate([
            $this->getPostRequestData('name') => 'string|min:1',
            $this->getPostRequestData('number') => 'number|min:10|max:10',
            $this->getPostRequestData('job') => 'string|min:1',
            $this->getPostRequestData('location_address') => 'string',
            $this->getPostRequestData('lat') => 'float|min:1',
            $this->getPostRequestData('lng') => 'float|min:1',
        ], ['name', 'Phone number', 'job', 'location_address', 'lat', 'lng'])->execute();


        if ($validation_result->getisValid()) {

            $contact = new PhoneBook();
            $contact->columns['name'] = $this->getPostRequestData('name');
            $contact->columns['number'] = $this->getPostRequestData('number');
            $contact->columns['job'] = $this->getPostRequestData('job');
            $contact->columns['location_address'] = $this->getPostRequestData('location_address');
            $contact->columns['location_lat'] = $this->getPostRequestData('lat');
            $contact->columns['location_long'] = $this->getPostRequestData('lng');
            $contact->columns['user_id'] = Auth::getInstance()->user()->id;


            $contact->insert();


            return Route::redirectTo(
                Route::to('index', 'PhoneBookController', null, false));

        } else {

            return $this->view->render('phone_book.create', $validation_result->getMessage());

        }

    }

    public function edit($id)
    {

        $instance = new PhoneBook();
        $contact = $instance->find($id);
        return $this->view->render('phone_book.edit', [
            "id" => $id,
            "contact" => $contact
        ]);
    }


    public function update($id)
    {

        $oldContact = $this->model->find($id);

        $updatedContact = new PhoneBook();


        $validation_result = $this->validator->validate([
            $this->getPostRequestData('name') => 'string|min:1',
            $this->getPostRequestData('number') => 'number|min:10|max:10',
            $this->getPostRequestData('job') => 'string|min:1',
            $this->getPostRequestData('location_address') => 'string',
            $this->getPostRequestData('lat') => 'float|min:1',
            $this->getPostRequestData('lng') => 'float|min:1',
        ], ['name', 'Phone number', 'job', 'location_address', 'lat', 'lng'])->execute();


        if ($validation_result->getisValid()) {

            $updatedContact->columns['name'] = $this->getPostRequestData('name');
            $updatedContact->columns['number'] = $this->getPostRequestData('number');
            $updatedContact->columns['job'] = $this->getPostRequestData('job');
            $updatedContact->columns['location_address'] = $this->getPostRequestData('location_address');
            $updatedContact->columns['location_lat'] = $this->getPostRequestData('lat');
            $updatedContact->columns['location_long'] = $this->getPostRequestData('lng');
            $updatedContact->columns['user_id'] = Auth::getInstance()->user()->id;
            $updatedContact->update()->where([array("id", "=", $oldContact->id)])->execute();


            return Route::redirectTo(
                Route::to('index', 'PhoneBookController', null, false));
        } else {
            return $this->view->render('phone_book.create', $validation_result->getMessage());
        }

    }

    public function delete($id)
    {

        $instance = new PhoneBook();


        $images = new PhoneBookImages();


        $selectedImages = $images->select(['*'], null)->where([array('phone_book_id', '=', $id)])->getAll();


//        print_r($selectedImages);


        foreach ($selectedImages as $image) {
            unlink("public/img/contacts_images/" . $image->image_url);
        }
//


        $images->delete()->where([array('phone_book_id', '=', $id)])->execute();

//        delete all related images from table
//        then delete contact
        $instance->delete()->where([array("id", "=", $id)])->execute();

//
        return Route::redirectTo(
            Route::to('index', 'PhoneBookController', null, false));
    }

    public function search()
    {

    }

}