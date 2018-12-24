<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 28/11/2018
 * Time: 00:46
 */

require_once  'SoftMapper.php';
class Model extends  SoftMapper
{


    public function __construct()
    {
        Parent::__construct();
//        $this->db=new DataBase(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);

    }

}