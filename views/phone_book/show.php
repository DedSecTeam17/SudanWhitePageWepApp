<html>
<head>
    <title>Show</title>
    <?php require 'views/partials/headers.php' ?>
</head>


<body>


<?php
require 'views/partials/nav_bar.php'
?>
<div class="container-fluid">


    <div class="row ">





        <div class="col-md-3 m-1 ">
            <div class="card" id="googleMap" style="height: 400px">
                <div class="card-body">

                </div>
            </div>
        </div>


        <div class="col-md-8 ">

            <div class="row ">
                <div class="col-md-2">

                </div>
                <div class="col-md-6 m-1">
                    <div class="card">
                        <div class="card-body">
                            <p><i class="fas fa-id-card"></i> <?php echo $data['contact']->name ?></p>
                            <p><i class="fas fa-mobile"></i> <?php echo $data['contact']->number ?></p>
                            <p><i class="fas fa-map-marker-alt"></i> <?php echo $data['contact']->location_address ?>
                            </p>
                            <p><i class="fas fa-briefcase"></i> <?php echo $data['contact']->job ?></p>
                            <p><i class="far fa-clock"></i> <?php echo PrettyTime::ago($data['contact']->create_at) ?></p>

                        </div>
                    </div>
                </div>





                <div class="col-md-3 m-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">


                                    <?php

                                    echo '<img src="' . '../public/img/' . $data['profile']->image_url . '"  width="50" height="50"
                                         class="rounded-circle" >';


                                    ?>

                                </div>

                                <div class="col-9">
                                    <p style="font-size: 14px; margin-top: 5%"><i class="fas fa-crown" style="color: gold"></i><?php echo $data['user']->name ?></p>
<!--                                    <p style="font-size: 11px">--><?php //echo $data['user']->email ?><!--</p>-->
                                </div>
                            </div>


                            <?php

                            if ($data['is_current_user']) {

                                ?>
                                <div class="row m-1">
                                    <div class="col-md-12">
                                        <a href="<?php echo Route::to('edit', 'PhoneBookController', $data['contact']->id, true) ?>"
                                           class="btn btn-outline-info btn-block"><i class="fas fa-edit"></i></a>
                                    </div>

                                </div>
                                <div class="row m-1">


                                    <div class="col-md-12">

                                        <form method="get"
                                              action="<?php echo Route::to('index', 'PhoneBookImagesController', null, false) ?>">

                                            <input hidden name="id" value="<?php echo $data['contact']->id ?>">


                                            <button type="submit" class="btn btn-outline-dark btn-block "><i
                                                        class="fas fa-image"></i></button>


                                        </form>
                                    </div>


                                </div>


                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row mt-5 mb-5">


                <div class="col-md-2">

                </div>

                <div class="col-md-6">

                    <div class="row">


                        <?php


                        foreach ($data['images'] as $image) {
                            echo '   <div class="col-md-4 m-1">';
                            echo '<img src="' . '../public/img/contacts_images/' . $image->image_url . '"  style= "width  : 300px; height : 200px" class="img-fluid rounded " >';
                            echo '  </div>';
                        }


                        ?>


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
    var lat = "<?php echo $data["contact"]->location_lat?>";
    var lng = "<?php echo $data["contact"]->location_long?>";


    console.log(lat)

    console.log(lng)

    var map


    var markers = [];

    function myMap() {


        var mapProp = {
            center: new google.maps.LatLng(lat, lng),
            zoom: 17,
        };
        map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        placeMarker(new google.maps.LatLng(lat, lng));


    }

    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    function clearMarkers() {
        setMapOnAll(null);
    }

    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

    function placeMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markers.push(marker);
    }


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYKGSQp99XR9BNeFYfVinw--4f4vRy0ZE&callback=myMap"></script>
</html>

