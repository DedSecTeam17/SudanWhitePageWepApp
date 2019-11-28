<html>
<head>
    <title>Home</title>
    <?php require 'views/partials/headers.php' ?>
</head>
<body>
<!--    nav bar -->

<?php
require 'views/partials/nav_bar.php'
?>


<div class="container-fluid">


    <div class="row ">


        <?php


        if (sizeof($data) <= 0) {

            echo '<div class=" col-md-6 offset-md-3 mt-5">


<div class="text-center">
<img src="../public/no_result.png" width="300" height="300"> 

</div>

</div>';

        }


        foreach ($data as $contact) {

            ?>


            <div class="  col-md-2  mt-5">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-body">

                        <div class="row mb-2 mt-2">
                            <div class="col-3">


                                <?php

                                echo '<img src="' . '../public/img/' . $contact->author_image . '"  width="50" height="50"
                                         class="rounded-circle" >';


                                ?>

                            </div>

                            <div class="col-9 mt-2">
                                <p style="font-size: 16px; "><?php echo $contact->author_name ?></p>
                            </div>
                        </div>

                        <hr>


                        <p><i class="fas fa-id-card"></i> <?php echo $contact->name ?></p>
                        <p><i class="fas fa-mobile"></i> <?php echo $contact->number ?></p>
                        <p><i class="far fa-clock"></i> <?php echo PrettyTime::ago($contact->create_at) ?></p>


                    </div>

                    <div class="card-footer">

                        <form action="<?php echo Route::to('show', 'PhoneBookController', null, false) ?>" method="get">
                            <input hidden name="id" value="<?php echo $contact->id ?>">
                            <button type="submit" class="btn btn-outline-info btn-block"><i
                                        class="fas fa-info-circle"></i> More details
                            </button>
                        </form>


                    </div>


                </div>
            </div>

        <?php } ?>

    </div>

</div>


<?php
require 'views/partials/footer.php'
?>
</body>

<script>
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(51.508742, -0.120850),
            zoom: 17,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYKGSQp99XR9BNeFYfVinw--4f4vRy0ZE&callback=myMap"></script>

</html>

