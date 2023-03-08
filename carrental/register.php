<head>
    <link rel="stylesheet" href="style.css">
</head>

<?php
$mysqli = new mysqli("localhost", "root", "", "final") or die("Connect failed: %s\n" . mysqli_connect_error());

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

$fnamea = $_POST["fname"];
$lnamea = $_POST["lname"];
$sex = $_POST["sex"];
$ssn = $_POST["ssn"];
$passworda = $_POST["password1"];
$passwordb = $_POST["password2"];
$emaila = $_POST["email"];
$encryptedpassworda = md5($passworda);
echo $fnamea."  ".$lnamea."  ".$sex."  ".$ssn."  ".$passworda."  ".$emaila."  ";
echo "1";
$output = $mysqli->query("SELECT * FROM `login` WHERE `email` = '$emaila'");
if ($output->num_rows > 0) {
    echo "2";

    echo "<h1>User already exist!</h1>";

    header("Location:register.html");
    die;
} 

$output = $mysqli->query("SELECT * FROM `customer` WHERE `ssn` = '$ssn'");
if ($output->num_rows > 0) {
    echo "2";

    echo "<h1>User already exist!</h1>";

    header("Location:register.html");
    die;
} 

if($passworda!=$passwordb)
{
    header("Location:register.html");
    die;
}

else {
    echo "3";

    $query = "INSERT INTO `customer`(`ssn`, `fname`, `lname`, `sex`, `email`) VALUES ('$ssn','$fnamea','$lnamea','$sex','$emaila');";
    $query2 = "INSERT INTO `login` (`email`, `password`) VALUES ('$emaila', '$passworda');";
    echo "4";

    if (mysqli_query($mysqli, $query) && mysqli_query($mysqli, $query2)) {
        echo "5";

        $_SESSION['ssn']=$user_data2['ssn'];
                $_SESSION['email']=$emaila;
                
        echo "<h1>Welcome " . $fnamea . "</h1>";
        header("Location:indexcustomer.php");
	    die;
		
    } else {
        echo "6";

        echo "<h1>Record Not Inserted</h1>";
    }
}
$mysqli->close();

?>