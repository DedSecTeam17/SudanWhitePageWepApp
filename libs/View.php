<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 28/11/2018
 * Time: 00:20
 */


class  View{

    public function __construct()
    {
//        echo 'this is the view';
    }


    public function render($name, $data = null)
    {
//        replace . with the slash
        $newName = str_replace('.', '/', $name);
        return require 'views/' . $newName . '.php';

    }

}