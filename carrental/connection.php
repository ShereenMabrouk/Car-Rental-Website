<?php
$dhbhost="localhost";
$dhbuser="root";
$dhbpass="";
$dhbname="final";

if (!$con=mysqli_connect($dhbhost,$dhbuser,$dhbpass,$dhbname))

{
	die('failed to connect!');
}
?>