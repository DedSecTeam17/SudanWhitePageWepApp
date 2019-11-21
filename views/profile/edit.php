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
                    <form method="post" enctype="multipart/form-data"
                          action="<?php echo Route::to('update', 'ProfileController', $data['id'], true) ?>">

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload profile image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                   name="profile_image">
                        </div>


                        <div class="form-group">
                            <label for="p_num">Number</label>
                            <input type="tel" class="form-control" id="phone_number" placeholder="Phone number"
                                   name="phone_number" required
                                   value="<?php echo !empty($data['profile']) ? $data['profile']->phone_number : "" ?>">
                        </div>

                        <div class="form-group">
                            <label for="job">Job</label>
                            <input type="text" class="form-control" id="job" placeholder="job" name="job" required
                                   value="<?php echo !empty($data['profile']) ? $data['profile']->job : "" ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">about</label>
                            <input class="form-control" id="address" placeholder="about_me" name="about_me"
                                      required  value="<?php echo !empty($data['profile']) ? $data['profile']->about_me : "" ?>">
                        </div>


                        <button type="submit" class="btn btn-outline-primary btn-block">Update</button>
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

