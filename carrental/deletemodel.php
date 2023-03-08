<?php
include("connection.php");

//Define the query

if(isset($_GET['model']))
{
  $model=$_GET['model'];
  

echo $model;
    
$query = "delete from specs where model='$model' limit 1";

//sends the query to delete the entry

$result=mysqli_query($con,$query);

header("Location:viewmodels.php");
}