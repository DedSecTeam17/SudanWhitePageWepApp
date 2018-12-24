<html>
<head>
    <title>Home Page</title>
    <?php require 'views/partials/headers.php' ?>
</head>
<body>
<div class="container-fluid">
    <?php
        require 'views/partials/nav_bar.php'
    ?>


    <div class="raw m-3">
        <div class="col-md-6 offset-3 ">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>


                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Send</button>
                        </div>
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

