<?php


class PhoneBookController extends Controller
{
    public function __construct()
    {
        Parent::__construct('PhoneBook');

    }


    public function index()
    {

        return $this->view->render('phone_book.index');
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

    }

    public function edit()
    {
        return $this->view->render('phone_book.edit');

    }

    public function update()
    {

    }

    public function delete()
    {
        return $this->view->render('phone_book.index');

    }

    public function search()
    {

    }

}