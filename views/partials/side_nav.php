<nav id="sidebar">
    <div class="sidebar-header">
        <h5>Sudan White Page</h5>
    </div>

    <ul class="list-unstyled components">



        <li>
            <a href="<?php echo Route::to('index', 'HomeController', null, false) ?>" class=" nav-link" style="color:white;">PhoneBook</a>
        </li>
        <li>
            <a href="<?php echo Route::to('about', 'HomeController', null, false) ?>" class=" nav-link" style="color:white;">About</a>
        </li>
        <li>
            <a href="<?php echo Route::to('ContactUs', 'HomeController', null, false) ?>" class=" nav-link" style="color:white;">Contact us</a>
        </li>
        <li>
            <a href="<?php echo Route::to('getLogOut', 'AuthController', null, false) ?>" class=" nav-link" style="color:white;">Log out</a>
        </li>


    </ul>
</nav>
