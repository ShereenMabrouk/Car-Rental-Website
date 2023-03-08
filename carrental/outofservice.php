<?php
include("connection.php");

//Define the query


if (isset($_GET['plateid'])) {

    $plateid = $_GET['plateid'];

    $query = "  SELECT * FROM `car` WHERE `plateid` LIKE '" . $plateid . "' AND `status` = 'out_of_service'";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $query2 = "UPDATE `car` SET `status`='active' WHERE `plateid` LIKE '" . $plateid . "'";
        $result = mysqli_query($con, $query2);
    } else {
        $query2 = "UPDATE `car` SET `status`='out_of_service' WHERE `plateid` LIKE '" . $plateid . "'";
        $result = mysqli_query($con, $query2);
    }

    header("Location:viewcars.php");
}
