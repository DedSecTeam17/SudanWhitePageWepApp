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
    <div class="row">
        <div class="col s6 offset-4">
            <div class="card">
                <div class="card-content">
                    <?php
                    echo  '
                    
                    <p><i class="fas fa-user-tie m-1" style="font-size: xx-large"></i>'.$data->getName().'</p>
                    
                     <p><i class="fas fa-mobile m-1" style="font-size: xx-large"></i>'.$data->getPhone().'</p>
                                         
                    <p><i class="fas fa-envelope m-1"  style="font-size: xx-large"></i>'.$data->getEmail().'</p>
                    ';
                    ?>

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

