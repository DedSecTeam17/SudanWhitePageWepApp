<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 27/11/2018
 * Time: 23:58
 */

class ErrorsController
{



    public function __construct()
    {
        echo '<p style="color: red">Error:controller not exist</p>';
        throw  new Exception('controller dose not exist');
    }

}