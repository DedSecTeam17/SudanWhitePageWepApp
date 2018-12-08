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
    <div class="row ">
        <div class="col s3">

        </div>
        <div class="col s6 ">
            <div class="card">
                <div class="card-content">
                    <form method="post" action="<?php echo Route::to('registerStore', 'AuthController', null) ?>">

                        <div class="input-field">
                            <label for="name">Full name</label>
                            <input type="text"  id="name" name="name" aria-describedby="name"
                                   placeholder="Enter name">
                        </div>
                        <div class="input-field">
                            <label for="email">Email address</label>
                            <input type="email"  id="email" name="email"
                                   aria-describedby="emailHelp"
                                   placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.
                            </small>
                        </div>
                        <div class="input-field">
                            <label for="password">Password</label>
                            <input type="password"  name="password" id="password"
                                   placeholder="Password">
                        </div>

                        <button type="submit" class="waves-effect waves-light btn-large" style="width: 100%">Register</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="col s3">

        </div>
    </div>


    <!--    -->

</div>

<?php
    require 'views/partials/footer.php'
?>
</body>
</html>

