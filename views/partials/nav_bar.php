<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo Route::to('index', 'HomeController', null, false) ?>">Home</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo Route::to('ContactUs', 'HomeController', null, false) ?>">Contact
                    Us</a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="<?php echo Route::to('about', 'HomeController', null, false) ?>">About Us</a>
            </li>

            <li class="nav-item dropdown">

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

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"
                           href="<?php echo Route::to('getLogOut', 'AuthController', null, false) ?>">Log out</a>

                    <?php } ?>


                </div>
            </li>
        </ul>
    </div>
</nav>









