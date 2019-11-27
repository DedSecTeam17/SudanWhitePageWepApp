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
            <?php
            isset($data) ? Message::AlertDanger($data) : '';
            ?>
            <div class="card">
                <div class="card-body">
                    <form method="post"

                          action="<?php echo Route::to('store', 'PhoneBookController', null, false) ?>">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="contact name" name="name"
                                   >

                            <div class="invalid-feedback">
                                invalid Name
                            </div>
                            <div class="valid-feedback">
                                valid Name
                            </div>


                        </div>

                        <div class="form-group">
                            <label for="p_num">Number</label>
                            <input type="tel" class="form-control" id="p_num" placeholder="Phone number" name="number"
                                   >

                            <div class="invalid-feedback">
                                invalid Number
                            </div>
                            <div class="valid-feedback">
                                valid Number
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="job">Job</label>
                            <input type="text" class="form-control" id="job" placeholder="job" name="job" >

                            <div class="invalid-feedback">
                                invalid job
                            </div>
                            <div class="valid-feedback">
                                valid job
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="address"
                                   name="location_address" >

                            <div class="invalid-feedback">
                                invalid address
                            </div>
                            <div class="valid-feedback">
                                valid address
                            </div>
                        </div>


                        <input  hidden  name="lat" id="lat">
                        <input hidden  name="lng" id="long">


                        <div class="m-2" id="googleMap" style="height: 300px">

                        </div>

                        <button id="submit_btn" type="submit" class="btn btn-outline-primary btn-block">Save</button>
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
    var map


    var markers = [];
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(51.508742, -0.120850),
            zoom: 17,
        };
        map = new google.maps.Map(document.getElementById("googleMap"), mapProp);


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


<script>
    var name = false;
    var phone_number = false;
    var job = false;
    var address = false;



    $(document).ready(function () {
        //jQuery code goes here
        checkIfAllValid();


        $('#name').on('input', function () {
            var input = $(this);
            var is_name = input.val();
            console.log(is_name);
            if (is_name) {
                input.removeClass("is-invalid").addClass("is-valid");
                name = true;
                checkIfAllValid();
            } else {
                input.removeClass("is-valid").addClass("is-invalid");
                name=false;
                checkIfAllValid();

            }
        });
        $('#p_num').on('input', function () {
            var input = $(this);
            var is_name = input.val();
            console.log(is_name);
            if (is_name && is_name.length===10) {
                input.removeClass("is-invalid").addClass("is-valid");
                phone_number = true;
                checkIfAllValid();
            } else {
                input.removeClass("is-valid").addClass("is-invalid");
                phone_number=false;
                checkIfAllValid();

            }
        });
        $('#job').on('input', function () {
            var input = $(this);
            var is_name = input.val();
            console.log(is_name);
            if (is_name) {
                input.removeClass("is-invalid").addClass("is-valid");
                job = true;
                checkIfAllValid();
            } else {
                input.removeClass("is-valid").addClass("is-invalid");
                job=false;
                checkIfAllValid();

            }
        });
        $('#address').on('input', function () {
            var input = $(this);
            var is_name = input.val();
            console.log(is_name);
            if (is_name) {
                input.removeClass("is-invalid").addClass("is-valid");
                address = true;
                checkIfAllValid();
            } else {
                input.removeClass("is-valid").addClass("is-invalid");
                address=false;
                checkIfAllValid();

            }
        });


        function checkIfAllValid() {

            // if (name && job && address && phone_number ){
            //     $('#submit_btn').prop('disabled', false);
            // }else {
            //     $('#submit_btn').prop('disabled', true);
            //
            // }
        }

    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYKGSQp99XR9BNeFYfVinw--4f4vRy0ZE&callback=myMap"></script>

<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYKGSQp99XR9BNeFYfVinw--4f4vRy0ZE&callback=initialize" async defer></script>-->
</body>
</html>

