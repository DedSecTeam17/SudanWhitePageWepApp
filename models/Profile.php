<?php


class Profile extends Model

{

    public $table_name='user_profile';
    public $fullAble=['id','user_id','about_me','image_url','phone_number', 'job'];


    public function __construct()
    {
        Parent::__construct();
    }

}