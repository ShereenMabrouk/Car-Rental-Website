<?php
include("connection.php");

//Define the query

if(isset($_GET['officeid']))
{
  $officeid=$_GET['officeid'];
  


    
$query = "delete from office where officeid='$officeid' limit 1";

//sends the query to delete the entry

$result=mysqli_query($con,$query);

header("Location:viewoffices.php");
}