<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 06/12/2018
     * Time: 12:00
     */




    foreach ($data->User as $user)
    {


       echo '<ul>';

       echo '<li>';
        echo '<ul>';

        echo '<li>'. $user['id'].'</li>';
        echo '<li>'. $user->name.'</li>';
        echo '<li>'. $user->phone.'</li>';
        echo '<li>'. $user->email.'</li>';
        echo '<li>'. $user->ImagePath.'</li>';




        echo '</ul>';
        echo '</li>';

        echo '</ul>';





    }





    ?>