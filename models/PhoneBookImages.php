<?php


class PhoneBookImages
    extends Model
{

    public $table_name='phone_book_images';
    public $fullAble=['id','phone_book_id','image_url',];


    public function __construct()
    {
        Parent::__construct();
    }

}