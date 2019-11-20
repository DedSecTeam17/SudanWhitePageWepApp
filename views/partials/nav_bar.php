<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


            <!--            --><?php
            $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


            ?>


            <li <?php if ($url === "http://localhost/server_projects/sudan_white_page/HomeController/index") { ?>  class=" nav-item active"   <?php } else { ?>      class="nav-item"   <?php } ?> >
                <a class="nav-link" href="<?php echo Route::to('index', 'HomeController', null, false) ?>">Home</a>
            </li>

            <li <?php if ($url === "http://localhost/server_projects/sudan_white_page/HomeController/ContactUs") { ?>  class=" nav-item active"   <?php } else { ?>      class="nav-item"   <?php } ?>>
                <a class="nav-link" href="<?php echo Route::to('ContactUs', 'HomeController', null, false) ?>">Contact
                    Us</a>
            </li>


            <li <?php if ($url === "http://localhost/server_projects/sudan_white_page/HomeController/about") { ?>  class=" nav-item active"   <?php } else { ?>      class="nav-item"   <?php } ?>>
                <a class="nav-link" href="<?php echo Route::to('about', 'HomeController', null, false) ?>">About Us</a>
            </li>

        </ul>


        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>


        <ul class="navbar-nav mr-5">
            <li class="nav-item dropdown ">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <?php
                    echo Auth::getInstance()->isAuthenticated() ? Auth::getInstance()->user()->name : '';
                    ?>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                    <?php if (!Auth::getInstance()->isAuthenticated()) { ?>

                        <a class="dropdown-item"
                           href="<?php echo Route::to('getLogin', 'AuthController', null, false) ?>">Login</a>
                        <a class="dropdown-item"
                           href="<?php echo Route::to('getRegister', 'AuthController', null, false) ?>">Register</a>

                    <?php } else { ?>

                        <!--                        <div class="dropdown-divider"></div>-->

                        <a class="dropdown-item"
                           href="<?php echo Route::to('index', 'ProfileController', null, false) ?>">My
                            profile</a>

                        <a class="dropdown-item"
                           href="<?php echo Route::to('index', 'PhoneBookController', null, false) ?>">My Contacts</a>


                        <a class="dropdown-item"
                           href="<?php echo Route::to('getLogOut', 'AuthController', null, false) ?>">Log out</a>

                    <?php } ?>


                </div>


            </li>

        </ul>
    </div>
</nav>









