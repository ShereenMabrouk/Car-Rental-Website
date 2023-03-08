<?php
include("connection.php");

//Define the query

if(isset($_GET['reservation_number']))
{
  $reservation_number=$_GET['reservation_number'];
  
 $today = date("Y-m-d");
$query1="select * from reservations where reservation_number='$reservation_number' AND (
        '$today' BETWEEN daterental  AND  datereturn ) limit 1 ";
$result1=mysqli_query($con,$query1);

if ($result1&& mysqli_num_rows($result1)>0)
		{

			$reservedcar = mysqli_fetch_assoc($result1);

            $reservedcarid = $reservedcar['plateid'];
            $sql3 = "UPDATE car SET status='active' WHERE plateid='$reservedcarid'";
            mysqli_query($con, $sql3);
		}


    
$query = "delete from reservations where reservation_number='$reservation_number' limit 1";



//sends the query to delete the entry

$result=mysqli_query($con,$query);

header("Location:myreservations.php");
}