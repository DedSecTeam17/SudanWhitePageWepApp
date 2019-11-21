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


        <div class="col-md-4 offset-md-4">

            <div class="card">
                <div class="card-body">
                    <div class="text-center">

                        <?php

                        if (!empty($data['profile'])) {

                            if ($data['profile'] !== "not_set") {
                                echo '<img src="' . '../public/img/' . $data['profile']->image_url . '" width="80" height="80" class="rounded-circle" >';

                            } else {
                                echo ' <img src="https://via.placeholder.com/600/56a8c2" width="80" height="80" class="rounded-circle">';
                            }
                        } else {

                            echo ' <img src="https://via.placeholder.com/600/56a8c2" width="80" height="80" class="rounded-circle">';

                        }

                        ?>


                    </div>


                    <?php


                    echo '<ul class="list-group list-group-flush mt-3">
                             <li class="list-group-item"><p><i class="fas fa-id-card"> </i>' . $data['user_name'] . '</p></li>';

                    if (empty($data['profile'])) {

                    } else {


                        echo '
                        
                          
                            <li class="list-group-item"><p><i class="fas fa-mobile"> </i>' . $data['profile']->phone_number . '</p></li>' .
                            '<li class="list-group-item"><p><i class="fas fa-briefcase"> </i>' . $data['profile']->job . '</p></li>' .

                            '<li class="list-group-item"><p><i class="fas fa-info"> </i>' . $data['profile']->about_me . '</p></li>';


                    }

                    echo '</ul>';

                    ?>


                    <a href="<?php echo Route::to('edit', 'ProfileController', !empty($data['profile']) ? $data['profile']->id : 0, true) ?>"
                       class="btn btn-outline-info mt-2">Edit profile</a>

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

