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


                <?php

                foreach ($data as $contact) {

                    echo ' <tr>';
                    echo ' <td>' . $contact->name . '</td>';
                    echo ' <td>' . $contact->number . '</td>';
                    echo ' <td>' . $contact->job . '</td>';
                    echo ' <td>' . $contact->location_address . '</td>';


                    echo ' <td>
 
                         <form method="get" action="'. Route::to('show', 'PhoneBookController', null, false).'">
                         <input hidden name="id" value="'.$contact->id.'">
                            <button class="btn btn-outline-info"  type="submit" >show</button> </form></td>';

                    echo '<form method="get"  action="' . Route::to('index', 'PhoneBookImagesController', null, false) . '">
                    
                 
                    ';
                    echo ' <td><button type="submit"  class="btn btn-outline-secondary" >Manage Images</button></td>';
                    echo '<input name="id" hidden value="' . $contact->id . '">';
                    echo '</form>';


                    echo ' <td><a  class="btn btn-outline-primary" href="' . Route::to('edit', 'PhoneBookController', $contact->id, true) . '" >Edit</a></td>';
                    echo ' <td><a  class="btn btn-outline-danger" href="' . Route::to('delete', 'PhoneBookController', $contact->id, true) . '" >Delete</a></td>';


                    echo '  </tr>';

                }

                ?>


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

