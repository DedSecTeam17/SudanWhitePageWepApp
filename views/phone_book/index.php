<html>
<head>
    <title>My contacts</title>
    <?php require 'views/partials/headers.php' ?>
</head>


<body>


<?php
require 'views/partials/nav_bar.php'
?>
<div class="container-fluid">

    <div class="row mt-5">


        <div class="col-md-8 offset-md-2">


            <div class="card card-custom bg-white border-white border-0">
                <div class="card-body">
                    <a class="btn btn-outline-info m-2"
                       href="<?php echo Route::to('create', 'PhoneBookController', null, false) ?>"><i class="far fa-plus-square"></i> CREATE NEW CONTACT</a>

                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th scope="col"><i class="fas fa-id-card"></i> Name</th>
                            <th scope="col"><i class="fas fa-mobile"></i> Phone number</th>
                            <th scope="col"><i class="fas fa-briefcase"></i> Job</th>
                            <th scope="col"><i class="fas fa-map-marker-alt"></i> Address</th>
                            <th scope="col"><i class="far fa-clock"></i> Created At</th>
                            <th scope="col"><i class="far fa-eye"></i> Show</th>
                            <th scope="col"><i class="far fa-images"></i> Manage Images</th>
                            <th scope="col"><i class="far fa-edit"></i> Edit</th>
                            <th scope="col"><i class="fas fa-trash"></i> Delete</th>
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
                            echo ' <td>' .PrettyTime::ago( $contact->create_at). '</td>';


                            echo ' <td>
 
                         <form method="get" action="'. Route::to('show', 'PhoneBookController', null, false).'">
                         <input hidden name="id" value="'.$contact->id.'">
                            <button class="btn btn-outline-info"  type="submit" ><i class="far fa-eye"></i> show</button> </form></td>';

                            echo '<form method="get"  action="' . Route::to('index', 'PhoneBookImagesController', null, false) . '">
                    
                 
                    ';
                            echo ' <td><button type="submit"  class="btn btn-outline-secondary" ><i class="far fa-images"></i> Manage Images</button></td>';
                            echo '<input name="id" hidden value="' . $contact->id . '">';
                            echo '</form>';


                            echo ' <td><a  class="btn btn-outline-primary" href="' . Route::to('edit', 'PhoneBookController', $contact->id, true) . '" ><i class="far fa-edit"></i>  Edit</a></td>';
                            echo ' <td><a  class="btn btn-outline-danger" href="' . Route::to('delete', 'PhoneBookController', $contact->id, true) . '" ><i class="fas fa-trash"></i> Delete</a></td>';


                            echo '  </tr>';

                        }

                        ?>


                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>

</div>


<?php
require 'views/partials/footer.php'
?>
</body>
</html>

