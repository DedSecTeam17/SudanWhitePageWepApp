<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 28/11/2018
 * Time: 00:05
 */

class Controller
{


    public function __construct()
    {
        $view=new View();
        echo  '<p style="color: deepskyblue" >this is the main Controller </p>';
    }


    public  function  view($name){
//        replace . with the slash
        $newName=str_replace('.','/',$name);
        require  'views/'.$newName.'.php';
    }

}