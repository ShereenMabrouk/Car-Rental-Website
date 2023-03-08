<head>
<link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
include("connection.php");


include("checklogin.php");
$mysqli = mysqli_connect("localhost","root","","final");
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
$passworda = $_POST["password"];
$emaila = $_POST["email"];
if ($emaila=="omar@gmail.com"&&$passworda=="1234")
{$_SESSION['email']=$emaila;
    echo "<h1>Welcome admin</h1>";

    header("Location:indexadmin.php");
	die;

} 
else {
    header("Location:admin.html");
    
    die;
}

?>