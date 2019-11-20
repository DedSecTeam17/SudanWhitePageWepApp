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


<div class="container-fluid">


    <div class="row m-1">

        <div class="col-md-2 mt-1">
            <div class="card">
                <div class="card-body">

                    <div id="googleMap" style="width:100%;height:200px;">

                    </div>


                    <p>Name</p>
                    <p>Phone Number</p>

                </div>

                <div class="card-footer">
                    <a href="<?php echo Route::to('show', 'PhoneBookController', 1, true) ?>"
                       class="btn btn-outline-info btn-block">More details</a>
                </div>


            </div>
        </div>
        <div class="col-md-2 mt-1">
            <div class="card">
                <div class="card-body">

                    <div id="googleMap" style="width:100%;height:200px;">

                    </div>


                    <p>Name</p>
                    <p>Phone Number</p>

                </div>

                <div class="card-footer">
                    <button class="btn btn-outline-info btn-block">More details</button>
                </div>


            </div>
        </div>
        <div class="col-md-2 mt-1">
            <div class="card">
                <div class="card-body">

                    <div id="googleMap" style="width:100%;height:200px;">

                    </div>


                    <p>Name</p>
                    <p>Phone Number</p>

                </div>

                <div class="card-footer">
                    <button class="btn btn-outline-info btn-block">More details</button>
                </div>


            </div>
        </div>
        <div class="col-md-2 mt-1">
            <div class="card">
                <div class="card-body">

                    <div id="googleMap" style="width:100%;height:200px;">

                    </div>


                    <p>Name</p>
                    <p>Phone Number</p>

                </div>

                <div class="card-footer">
                    <button class="btn btn-outline-info btn-block">More details</button>
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

