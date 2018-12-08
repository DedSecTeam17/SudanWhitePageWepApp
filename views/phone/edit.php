<html>
<head>
    <title>Home Page</title>
    <?php require 'views/partials/headers.php' ?>
</head>
<body>
<div class="container-fluid">
    <!--    nav bar -->
    <?php
        require 'views/partials/nav_bar.php'
    ?>
    <!-- login-->
    <div class="row m-2">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo Route::to('update', 'PhoneController', $data->getId(), true) ?>">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" value="<?php echo  $data->getName()?>" class="form-control" id="name" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" value="<?php echo  $data->getPhone()?>" class="form-control" id="phone" name="phone"
                                   placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" value="<?php echo  $data->getEmail()?>" class="form-control" id="email" name="email"
                                   aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">update</button>
                    </form>
                </div>

            </div>

        </div>
    </div>


    <!--    -->

</div>

<?php
    require 'views/partials/footer.php'
?>
</body>
</html>

