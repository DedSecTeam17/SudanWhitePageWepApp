<?php


class ProfileController
    extends Controller
{
    public function __construct()
    {
        Parent::__construct('Profile');

    }


    public function index()
    {

        return $this->view->render('profile.index');
    }

    public function create()
    {
        return $this->view->render('profile.create');

    }

    public function store()
    {

    }

    public function edit()
    {
        return $this->view->render('profile.edit');

    }

    public function update()
    {

    }



}