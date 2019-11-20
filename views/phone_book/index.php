<html>
<head>
    <title>Home Page</title>
    <?php require 'views/partials/headers.php' ?>
</head>


<body>


<?php
require 'views/partials/nav_bar.php'
?>
<div class="container-fluid">

    <div class="row mt-5">


        <div class="col-md-6 offset-md-3">
            <a class="btn btn-outline-info m-2"
               href="<?php echo Route::to('create', 'PhoneBookController', null, false) ?>">CREATE NEW CONTACT</a>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Job</th>
                    <th scope="col">Address</th>
                    <th scope="col">Show</th>
                    <th scope="col">Manage Images</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>
                        <a class="btn btn-outline-info"
                           href="<?php echo Route::to('show', 'PhoneBookController', 1, true) ?>"> Show</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-info"
                           href="<?php echo Route::to('index', 'PhoneBookImagesController', 1, true) ?>"> Mange images</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-primary"
                           href="<?php echo Route::to('edit', 'PhoneBookController', 1, true) ?>">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-danger"
                           href="<?php echo Route::to('delete', 'PhoneBookController', 1, true) ?>">Delete</a>
                    </td>

                </tr>


                </tbody>
            </table>
        </div>

    </div>

</div>


<?php
require 'views/partials/footer.php'
?>
</body>
</html>

