<?php
include("connection.php");

//Define the query


if (isset($_GET['plateid'])) {
  $plateid = $_GET['plateid'];


  $query = "delete from reservations where plateid='$plateid' limit 1";

  $result = mysqli_query($con, $query);

  $query = "delete from car where plateid='$plateid' limit 1";

  //sends the query to delete the entry

  $result = mysqli_query($con, $query);

  header("Location:viewcars.php");
}
