<?php
require 'models/PhoneBookImages.php';
require 'models/Profile.php';
require 'models/User.php';


/**
 * Class PhoneBookController
 */
class PhoneBookController extends Controller
{
    /**
     * PhoneBookController constructor.
     * give it the model related to this controller
     * you can assign middleware on top of this controller for redirection purpose
     */
    public function __construct()
    {
        Parent::__construct('PhoneBook');
        $this->middleWare('Auth', ["show"]);

    }


    /**
     * @return mixed
     * get all contacts related to authenticated user order by creation date
     * and render index page to show all  data
     */
    public function index()
    {

        $contacts = new PhoneBook();

        $data = $contacts->select(['*'], null)->where([array("user_id", "=", Auth::getInstance()->user()->id)])->
        orderBy('create_at', 'desc')->getAll();


        return $this->view->render('phone_book.index', $data);
    }

    /**
     * @return mixed
     * render crate pate to add new contact
     */
    public function create()
    {
        return $this->view->render('phone_book.create');

    }

    /**
     * @return mixed
     * render dhow page include all data related to specific contact
     */
    public function show()
    {


//       echo  $new;

        /** @var TYPE_NAME $id */
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

    /**
     * @return mixed|void
     * get all data from post or get request to sett model vars and then use model method to add new contact
     * then redirect to index page to see last added contact
     */
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
            $contact->columns['create_at'] = date(DATE_ISO8601);

            $contact->columns['user_id'] = Auth::getInstance()->user()->id;


            $contact->insert();


            return Route::redirectTo(
                Route::to('index', 'PhoneBookController', null, false));

        } else {

            return $this->view->render('phone_book.create', $validation_result->getMessage());

        }

    }

    /**
     * @param $id
     * @return mixed
     * contact id passed from url to get selected contact
     *pass selected contact to view to show it ot user
     *render edit page
     */
    public function edit($id)
    {

        $instance = new PhoneBook();
        $contact = $instance->find($id);
        return $this->view->render('phone_book.edit', [
            "id" => $id,
            "contact" => $contact
        ]);
    }


    /**
     * @param $id
     * @return mixed|void
     * update  selected contact by it id then redirect io index page
     */
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

    /**
     * @param $id
     * delete specific contact by id then redirect to index page
     */
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

    /**
     *
     */
    public function search()
    {

    }

}