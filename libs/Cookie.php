<?php


class Cookie
{


    public static function setLatTime()
    {
        date_default_timezone_set("Africa/Cairo");

//            echo "The time in " . date_default_timezone_get() . " is " . date("H:i:s");


            setCookie('lasttime', date(DATE_ISO8601), time() + 604800);
    }


    public static function getLastTime()
    {
        if (!isset($_COOKIE['lasttime'])) {
            return "";
        } else {


            return ' <div class="alert alert-primary" role="alert"> <i class="fas fa-user-clock"></i>'.
            "Last Sign-In  " . PrettyTime::ago($_COOKIE['lasttime']).
             '</div>';


        }
    }


}