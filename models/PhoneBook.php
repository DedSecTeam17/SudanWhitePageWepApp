<?php


class PhoneBook extends Model

{

    public $table_name='phone_book';
    public $fullAble=['id','name','number','location_address','location_lat', 'location_long','job','user_id','create_at'];


    public function __construct()
    {
        Parent::__construct();
    }

}