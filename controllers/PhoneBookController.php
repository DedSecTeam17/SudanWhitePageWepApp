<?php


class PhoneBookController extends Controller
{
    public function __construct()
    {
        Parent::__construct('PhoneBook');
        $this->middleWare('Auth');

    }


    public function index()
    {

        $contacts = new PhoneBook();

        $data = $contacts->select(['*'], null)->where([array("user_id", "=", Auth::getInstance()->user()->id)])->
        orderBy('id','desc')->getAll();


        return $this->view->render('phone_book.index', $data);
    }

    public function create()
    {
        return $this->view->render('phone_book.create');

    }

    public function show($id)
    {
        return $this->view->render('phone_book.show');

    }

    public function store()
    {
        $contact = new PhoneBook();
        $contact->columns['name'] = $this->getPostRequestData('name');
        $contact->columns['number'] = $this->getPostRequestData('number');
        $contact->columns['job'] = $this->getPostRequestData('job');
        $contact->columns['location_address'] = $this->getPostRequestData('location_address');
        $contact->columns['location_lat'] =  $this->getPostRequestData('lat');
        $contact->columns['location_long'] =  $this->getPostRequestData('lng');
        $contact->columns['user_id'] = Auth::getInstance()->user()->id;


        $contact->insert();


        return Route::redirectTo(
            Route::to('index', 'PhoneBookController', null, false));

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



        $updatedContact->columns['name'] = $this->getPostRequestData('name');
        $updatedContact->columns['number'] = $this->getPostRequestData('number');
        $updatedContact->columns['job'] = $this->getPostRequestData('job');
        $updatedContact->columns['location_address'] = $this->getPostRequestData('location_address');
        $updatedContact->columns['location_lat'] =  $this->getPostRequestData('lat');
        $updatedContact->columns['location_long'] =  $this->getPostRequestData('lng');
        $updatedContact->columns['user_id'] = Auth::getInstance()->user()->id;
        $updatedContact->update()->where([array("id", "=", $oldContact->id)])->execute();


        return Route::redirectTo(
            Route::to('index', 'PhoneBookController', null, false));
    }

    public function delete($id)
    {

        $instance = new PhoneBook();
        $instance->delete()->where([array("id", "=", $id)])->execute();
        return Route::redirectTo(
            Route::to('index', 'PhoneBookController', null, false));
    }

    public function search()
    {

    }

}