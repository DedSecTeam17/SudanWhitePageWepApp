<html>
<head>
    <title>Home Page</title>
    <?php require 'views/partials/headers.php' ?>
</head>
<body>
    <!--    nav bar -->
    <?php
        require 'views/partials/nav_bar.php'
    ?>

    
    <div class="raw">
        <div class="col s12">
            <img src="../public/img/team.png">
        </div>
    </div>

    <hr>


        <?php
            echo ' <div class="row">';

            foreach ($data as $phone) {


                echo '
<div class="col s-3">
                    <div class="card">
        <div class="card-image">
            <img src="' . '../public/img/' . $phone->getImage() . '" style="width: 300px; height: 300px" >     
                 <span class="card-title">' . $phone->getName() . '
</span>
        </div>


        <div class="card-content">
    
            <p>' . $phone->getPhone() . '</p>
            <p>' . $phone->getEmail() . '</p>
        </div>


        <div class="card-action">
            <a href="' . Route::to('delete', 'PhoneController', $phone->getId(), true) . '"  class="btn btn-danger ">Delete</a>

            <a href="' . Route::to('edit', 'PhoneController', $phone->getId(), true) . '"  class="btn btn-primary ">Edit</a>
            <a href="' . Route::to('show', 'PhoneController', $phone->getId(), true) . '"  class="btn btn-info ">Show</a>
        </div>
        
    </div>
    </div>

             
             
             ';


            }

            echo '</div>';

        ?>




<?php
    require 'views/partials/footer.php'
?>
</body>
</html>

