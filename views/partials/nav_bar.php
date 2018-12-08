<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--    <a class="navbar-brand" href="#">PhoneBook</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"-->
<!--            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!---->
<!--    <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!---->
<!---->
<!--        <ul class="navbar-nav mr-auto">-->
<!---->
<!--            --><?php
    //
    //                if (!Auth::getInstance()->isAuthenticated()) {
    //                    echo '
    //                     <li class="nav-item active">
    //                <a   href="' . Route::to('index', 'HomeController', null, false) . '">Home</span></a>
    //            </li>
    //            <li   >
    //                <a   href="' . Route::to('about', 'HomeController', null, false) . '">About</a>
    //            </li>
    //
    //            <li   >
    //                <a   href="' . Route::to('contactUs', 'HomeController', null, false) . '">Contact us</a>
    //            </li>
    //
    //
    //                    ';
    //                } else {
    //
    //                    echo '
    //
    //
    //
    //                       <li   >
    //                <a   href="' . Route::to('index', 'PhoneController', null, false) . '">Home Page</a>
    //            </li>
    //
    //                    ';
    //
    //                }
    //
    //
    //            ?>
<!---->
<!---->
<!--                      frop down-->
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"-->
<!--                   aria-haspopup="true" aria-expanded="false">-->
<!--                    Dropdown-->
<!--                </a>-->
<!--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!---->
<!--                    --><?php
    //
    //
    //                        if (!Auth::getInstance()->isAuthenticated()) {
    //
    //                            echo '
    //                           <a      href="' . Route::to('getLogin', 'AuthController', null, false) . '">Login </a>
    //                            <a      href="' . Route::to('getRegister', 'AuthController', null, false) . '">New
    //                             User</a>
    //
    //                        ';
    //
    //                        } else {
    //
    //                            echo '
    //
    //                                                   <a      href="' . Route::to('getLogOut', 'AuthController', null, false) . '">LogOut </a>
    //
    //                        ';
    //
    //                        }
    //
    //                    ?>
<!---->
<!---->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!---->
<!--        <span class="navbar-text">-->
<!--            --><?php
    //                if (Auth::getInstance()->isAuthenticated())
    //                    echo '<i class="fas fa-user-tie m-1" style="font-size: xx-large"></i>' . Auth::getInstance()->user()->getFullName();
    //            ?>
<!--    </span>-->
<!--    </div>-->
<!--</nav>-->


<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">


    <?php


        if (!Auth::getInstance()->isAuthenticated()) {

            echo '
            <li>                                   <a      href="' . Route::to('getLogin', 'AuthController', null, false) . '">Login </a>
</li>
                                <li>
                                    <a      href="' . Route::to('getRegister', 'AuthController', null, false) . '">New
                                     User</a>
</li>
        
                                ';

        } else {

            echo '
            
            <li>
                                                                       <a      href="' . Route::to('getLogOut', 'AuthController', null, false) . '">LogOut </a>

</li>
        
        
                                ';

        }

    ?>
</ul>
<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">PhoneBook</a>
        <ul class="right hide-on-med-and-down">

            <?php

                if (!Auth::getInstance()->isAuthenticated()) {
                    echo '
                     <li class="nav-item active">
                <a   href="' . Route::to('index', 'HomeController', null, false) . '">Home</span></a>
            </li>
            <li   >
                <a   href="' . Route::to('about', 'HomeController', null, false) . '">About</a>
            </li>

            <li   >
                <a   href="' . Route::to('contactUs', 'HomeController', null, false) . '">Contact us</a>
            </li>


                    ';
                } else {

                    echo '



            <li>
                <a   href="' . Route::to('index', 'PhoneController', null, false) . '">Home Page</a>
    </li>

                    ';


                }
            ?>


            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">arrow_drop_down</i></a>
            </li>
        </ul>
    </div>
</nav>

<style>
    body {
        font-family: 'Roboto', sans-serif;
    }
</style>


<script>
    $(document).ready(function () {
        $(".dropdown-trigger").dropdown();

    });

</script>