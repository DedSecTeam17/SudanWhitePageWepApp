<html>
<head>
    <title>Home Page</title>
    <?php require 'views/partials/headers.php' ?>
</head>


<body>


<div class="wrapper ">



    <!-- Sidebar -->
    <?php
    require 'views/partials/nav_bar.php'
    ?>


    <!-- Page Content -->
    <div id="content">
        <!-- We'll fill this with dummy content -->
        <div class="row mt-5">


            <div class="col-md-6 offset-md-3">
             <div class="jumbotron">
                 <h4>About us</h4><br>
                 <p>'m writing a website in HTML5 and Bootstrap 4 and I'm trying to turn a square image into a circle. In Bootstrap 3 this was easily do-able with .img-circle, but now I can't seem to get it to work and I can't find any answers online. Has Bootstrap dropped the img-circle class or is my code messed up?</p>
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

