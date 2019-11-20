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


        <div class="col-md-6 offset-md-3">
            <button class="btn btn-outline-info m-2">CREATE NEW CONTACT</button>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Job</th>
                    <th scope="col">Address</th>
                    <th scope="col">Show on map</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>
                        <button class="btn btn-outline-info">Show in map</button>
                    </td>
                    <td>
                        <button class="btn btn-outline-primary">Edit</button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger">Delete</button>
                    </td>

                </tr>


                </tbody>
            </table>
        </div>

    </div>

</div>


<?php
require 'views/partials/footer.php'
?>
</body>
</html>

