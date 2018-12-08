<html lang="ar">
<head>
    <title>Home Page</title>
    <?php require 'views/partials/headers.php' ?>
</head>
<body>
    <!--    nav bar -->
    <?php
        require 'views/partials/nav_bar.php'
    ?>
    <!-- login-->
    <div class="row">
        <div class="col s3"></div>
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <form method="post" enctype="multipart/form-data" action="<?php echo Route::to('store', 'PhoneController', null, false) ?>">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                   placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <button type="submit" class="waves-effect waves-light btn" style="width: 100%; margin-top: 2%">Add</button>
                    </form>
                </div>

            </div>

        </div>
        <div class="col s3"></div>

    </div>


    <!--    -->
    <?php
        require 'views/partials/footer.php'
    ?>


</body>

</html>

