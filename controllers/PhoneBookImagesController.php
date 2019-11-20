<?php


class PhoneBookImagesController
    extends Controller
{
    public function __construct()
    {
        Parent::__construct('PhoneBookImages');

    }


    public function index()
    {

        return $this->view->render('phone_book_images.index');
    }



    public function store()
    {

    }





    public function delete()
    {

    }



}