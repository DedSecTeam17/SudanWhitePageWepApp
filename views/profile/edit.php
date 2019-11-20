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
                            <label for="exampleFormControlFile1">Upload profile image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                   name="contact_image">
                        </div>


                        <div class="form-group">
                            <label for="p_num">Number</label>
                            <input type="tel" class="form-control" id="p_num" placeholder="Phone number" name="p_num">
                        </div>

                        <div class="form-group">
                            <label for="job">Job</label>
                            <input type="text" class="form-control" id="job" placeholder="job" name="job">
                        </div>
                        <div class="form-group">
                            <label for="address">about</label>
                            <textarea  class="form-control" id="address" placeholder="address" name="address"></textarea>
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

