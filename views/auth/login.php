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

    <?php
        isset($data) ?   Message::AlertDanger($data) : '';
    ?>

    <div class="raw m-3">
        <div class="col-md-6 offset-3">

            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo Route::to('loginStore', 'AuthController', null) ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Enter email" name="email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Log in</button>
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

