<html lang="ar">
<head>
    <title>Home Page</title>
    <?php require 'views/partials/headers.php' ?>
</head>


<body>


<?php
require 'views/partials/nav_bar.php'
?>
<div class="container-fluid">

    <div class="container-fluid">

        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data"
                              action="<?php echo Route::to('store', 'PhoneBookImagesController', null, false) ?>">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload contact image</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                       name="image" required>
                            </div>

                            <input hidden name="id" value="<?php echo $data["id"] ?>">


                            <div class="form-group">
                                <button class="btn btn-outline-dark btn-block"><i class="fas fa-upload"></i></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card">

                <div class="card-body">
                    <div class="row">

                        <?php


                        foreach ($data["images"] as $image) {


                            echo ' <div class="col-md-6 mt-1">
                            <div class="card">';


                            echo '  <div class="card-header">';


                            echo '<form method="get" action="' . Route::to('delete', 'PhoneBookImagesController', $image->id, true) . '">';

                            echo '<input  hidden name="contact_id" value="' . $data["id"] . '"> ';
                            echo ' <button type="submit"  class="btn btn-outline-danger" ><i class="fas fa-minus-square"></i></button>';
                            echo '</form>';


                            echo '</div>';


                            echo '<div class="card-body">';


                            echo '<img src="' . '../public/img/contacts_images/' . $image->image_url . '" style="width : 100%; height : 150px;" >';

                            echo '</div>';


                            echo ' </div>
                        </div>';


                        }


                        ?>

                        <!--                        -->


                        <!--                   -->
                    </div>
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

