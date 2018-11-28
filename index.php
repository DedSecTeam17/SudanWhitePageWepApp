<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 27/11/2018
 * Time: 23:03
 */



// auto loader
require 'libs/BootStrap.php';
require  'libs/Model.php';
require  'libs/View.php';
require  'libs/Controller.php';


$bootstrap = new BootStrap();
$bootstrap->_init();