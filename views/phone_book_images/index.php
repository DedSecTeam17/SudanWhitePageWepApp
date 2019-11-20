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
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload contact image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                   name="contact_image">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-dark btn-block"><i class="fas fa-upload"></i></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mt-1">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?php echo Route::to('delete', 'PhoneBookImageController', 1, true) ?>"  class="btn btn-outline-danger"><i class="fas fa-minus-square"></i></a>
                                </div>
                                <div class="card-body">
                                    <img src="https://via.placeholder.com/600/771796"
                                         style="width: 100%; height: 150px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-outline-danger"><i class="fas fa-minus-square"></i></button>
                                </div>
                                <div class="card-body">
                                    <img src="https://via.placeholder.com/600/771796"
                                         style="width: 100%; height: 150px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-outline-danger"><i class="fas fa-minus-square"></i></button>
                                </div>
                                <div class="card-body">
                                    <img src="https://via.placeholder.com/600/771796"
                                         style="width: 100%; height: 150px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-outline-danger"><i class="fas fa-minus-square"></i></button>
                                </div>
                                <div class="card-body">
                                    <img src="https://via.placeholder.com/600/771796"
                                         style="width: 100%; height: 150px">
                                </div>
                            </div>
                        </div>
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

