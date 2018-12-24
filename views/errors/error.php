<html>
<head>
    <title>Home Page</title>
    <?php require 'views/partials/headers.php' ?>
</head>
<body>
<!--    nav bar -->

<div class="container-fluid">
    <?php
        require 'views/partials/nav_bar.php'
    ?>

    <div class="raw m-3">
        <div class="col-md-8 offset-2">
            <div class="alert alert-danger">

                <?php

                    echo  $data;


                ?>
            </div>
        </div>
    </div>

</div>

<?php
    require 'views/partials/footer.php'
?>
</body>
</html>

