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
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" class="form-control" id="phone_number" placeholder="Phone number"
                                   name="phone_number" required
                                   value="<?php echo !empty($data['profile']) ? $data['profile']->phone_number : "" ?>">

                            <div class="invalid-feedback">
                                invalid Phone Number
                            </div>
                            <div class="valid-feedback">
                                valid Phone Number
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="job">Job</label>
                            <input type="text" class="form-control" id="job" placeholder="job" name="job" required
                                   value="<?php echo !empty($data['profile']) ? $data['profile']->job : "" ?>">

                            <div class="invalid-feedback">
                                invalid
                            </div>
                            <div class="valid-feedback">
                                valid
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about_me">about</label>
                            <input class="form-control" id="about_me" placeholder="about_me" name="about_me"
                                   required
                                   value="<?php echo !empty($data['profile']) ? $data['profile']->about_me : "" ?>">

                            <div class="invalid-feedback">
                                invalid
                            </div>
                            <div class="valid-feedback">
                                valid
                            </div>
                        </div>


                        <button id="submit_btn" type="submit" class="btn btn-outline-primary btn-block">Update</button>
                    </form>
                </div>

            </div>


        </div>

    </div>

</div>


<script>


    $(document).ready(function () {
        //jQuery code goes here
        // checkIfAllValid();

        var phone_number = true;
        var job = true;
        var address = true;


        checkIfAllValid();

        $('#phone_number').on('input', function () {
            var input = $(this);
            var is_name = input.val();
            console.log(is_name);
            if (is_name && is_name.length === 10) {
                input.removeClass("is-invalid").addClass("is-valid");
                phone_number = true;
                checkIfAllValid();
            } else {
                input.removeClass("is-valid").addClass("is-invalid");
                phone_number = false;
                checkIfAllValid();

            }
        });


        $('#job').on('input', function () {
            var input = $(this);
            var is_name = input.val();
            console.log(is_name);
            if (is_name) {
                input.removeClass("is-invalid").addClass("is-valid");
                job = true;
                checkIfAllValid();
            } else {
                input.removeClass("is-valid").addClass("is-invalid");
                job = false;
                checkIfAllValid();

            }
        });


        $('#about_me').on('input', function () {
            var input = $(this);
            var is_name = input.val();
            console.log(is_name);
            if (is_name) {
                input.removeClass("is-invalid").addClass("is-valid");
                address = true;
                checkIfAllValid();
            } else {
                input.removeClass("is-valid").addClass("is-invalid");
                address = false;
                checkIfAllValid();

            }
        });


        function checkIfAllValid() {

            if (name && job && address && phone_number) {
                $('#submit_btn').prop('disabled', false);
            } else {
                $('#submit_btn').prop('disabled', true);

            }
        }

    });
</script>

<?php
require 'views/partials/footer.php'
?>

</body>
</html>

