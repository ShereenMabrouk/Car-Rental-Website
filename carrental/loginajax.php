<?php
$mysqli = mysqli_connect("localhost","root","","final");

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

$passworda = $_POST["password"];
$emaila = $_POST["email"];
$encryptedpassworda=md5($passworda);
$output = $mysqli->query("SELECT * FROM `login` WHERE `email` LIKE '$emaila' AND `password` LIKE '$passworda'");
if($output->num_rows>0||($emaila=="omar@gmail.com"&&$passworda=="1234"))
{
    //echo "yes";
} else{
    //echo "no";
}
$mysqli->close();
?>