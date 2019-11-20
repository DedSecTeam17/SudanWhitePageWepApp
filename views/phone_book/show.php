<html>
<head>
    <title>Home Page</title>
    <?php require 'views/partials/headers.php' ?>
</head>


<body>


<?php
require 'views/partials/nav_bar.php'
?>
<div class="container-fluid">


    <div class="row m-5">


        <div class="col-md-3 ">
            <div class="card" id="googleMap" style="height: 400px">
                <div class="card-body">

                </div>
            </div>
        </div>


        <div class="col-md-9">

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p><i class="fas fa-id-card"></i> Name</p>
                            <p><i class="fas fa-mobile"></i> 09026333898</p>
                            <p><i class="fas fa-map-marker-alt"></i> Address</p>
                            <p><i class="fas fa-briefcase"></i> Job</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="https://via.placeholder.com/600/771796" width="50" height="50"
                                         class="rounded-circle">
                                </div>

                                <div class="col-md-9">
                                    <p style="font-size: 12px">Mohammed Elamin</p>
                                    <p style="font-size: 12px">melamin100@yahoo.com</p>
                                </div>
                            </div>

                            <div class="row m-1">
                                <a  href="<?php echo Route::to('edit', 'PhoneBookController', 1, true) ?>"  class="btn btn-outline-info btn-block"><i class="fas fa-edit"></i></a>

                            </div>
                            <div class="row m-1">
                                <a  href="<?php echo Route::to('delete', 'PhoneBookController', 1, true) ?>"  class="btn btn-outline-danger btn-block"><i class="fas fa-trash"></i></a>
                            </div>

                            <div class="row m-1">
                                <a href="<?php echo Route::to('index', 'PhoneBookImagesController', 1, true) ?>"
                                   class="btn btn-outline-dark btn-block"><i class="fas fa-image"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="row mt-5 mb-5">


                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-3 mt-1">
                            <img src="https://via.placeholder.com/600/771796" style="width: 100%; height: 100%">
                        </div>
                        <div class="col-md-3  mt-1">
                            <img src="https://via.placeholder.com/600/771796" style="width: 100%; height: 150px">
                        </div>

                    </div>


                </div>


            </div>

        </div>
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

