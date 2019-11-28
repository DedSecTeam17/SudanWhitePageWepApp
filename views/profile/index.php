<html>
<head>
    <title>My profile</title>
    <?php require 'views/partials/headers.php' ?>
</head>


<body>


<?php
require 'views/partials/nav_bar.php'
?>
<div class="container-fluid">

    <div class="row mt-5">


        <div class="col-md-4 offset-md-4">

            <div class="card card-custom bg-white border-white border-0">
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
                             <li class="list-group-item"><p><i class="fas fa-id-card"> </i> ' . $data['user_name'] . '</p></li>';

                    if (empty($data['profile'])) {

                    } else {


                        echo '
                        
                          
                            <li class="list-group-item"><p><i class="fas fa-mobile"> </i> ' . $data['profile']->phone_number . '</p></li>' .
                            '<li class="list-group-item"><p><i class="fas fa-briefcase"> </i> ' . $data['profile']->job . '</p></li>' .

                            '<li class="list-group-item"><p><i class="fas fa-info"> </i> ' . $data['profile']->about_me . '</p></li>';


                    }

                    echo '</ul>';

                    ?>



                    <form method="get" action="<?php echo Route::to('edit', 'ProfileController', null, false) ?>">

                        <input name="id" hidden value="<?php echo !empty($data['profile']) ? $data['profile']->id : 0?>">

                        <button type="submit"
                           class="btn btn-outline-info mt-2"><i class="far fa-edit"></i>  Edit profile</button>
                    </form>



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

