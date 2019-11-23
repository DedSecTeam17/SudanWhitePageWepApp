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

    <div class="row mt-5">


        <div class="col-md-4 offset-md-4">

            <div class="card">
                <div class="card-body">
                    <form method="post"
                          action="<?php echo Route::to('update', 'PhoneBookController', $data["id"], true) ?>">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="contact name" name="name"
                                   value="<?php echo !empty($data["contact"]) ? $data["contact"]->name : "" ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="p_num">Number</label>
                            <input type="tel" class="form-control" id="p_num" placeholder="Phone number" name="number"
                                   value="<?php echo !empty($data["contact"]) ? $data["contact"]->number : "" ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="job">Job</label>
                            <input type="text" class="form-control" id="job" placeholder="job" name="job"
                                   value="<?php echo !empty($data["contact"]) ? $data["contact"]->job : "" ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="address"
                                   name="location_address"
                                   value="<?php echo !empty($data["contact"]) ? $data["contact"]->location_address : "" ?>" required>
                        </div>
                        <input hidden name="lat" id="lat" required>
                        <input hidden name="lng" id="long" required>
                        <div class="m-2" id="googleMap" style="height: 300px">

                        </div>

                        <button type="submit" class="btn btn-outline-info btn-block">Update</button>
                    </form>
                </div>

            </div>


        </div>

    </div>

</div>


<?php
require 'views/partials/footer.php'
?>

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

        google.maps.event.addListener(map, 'click', function (event) {
            console.log("click");
            deleteMarkers();
            placeMarker(event.latLng);

            document.getElementById("lat").value = event.latLng.lat();
            document.getElementById("long").value = event.latLng.lng();


        });


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
</body>
</html>

