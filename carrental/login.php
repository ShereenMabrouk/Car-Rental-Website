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
//if ($emaila=="omar@gmail.com"&&$passworda=="1234")
//{
//	$_SESSION['email']=$emaila;
   // echo "<h1>Welcome admin</h1>";

  //  header("Location:indexadmin.php");
	//die;
//}
//else
//{


$query = "select * from login where email='$emaila' limit 1";
	$result=mysqli_query($con,$query);
	if($result && mysqli_num_rows($result)>0)
	{
		$user_data=mysqli_fetch_assoc($result);
		if($user_data['password']==$passworda)
		{$query1 = "select * from customer where email='$emaila' limit 1";

	        $result1=mysqli_query($con,$query1);
	       if($result1 && mysqli_num_rows($result1)>0)
	           {
	           	$user_data2=mysqli_fetch_assoc($result1);
			    $_SESSION['ssn']=$user_data2['ssn'];
			    $_SESSION['email']=$emaila;
			}}
			else{
				header("Location:login.html");
				die;
			}

	//header("Location:indix.php");
	//die;
echo "<h1>Welcome ".$user_data2["fname"]."</h1>";
header("Location:indexcustomer.php");
	die;
		}
else
{
	//echo "wrong email!";
	echo '<script>alert("wrong email!")</script>';
	header("Location:login.html");
				die;
	
}
//}

?>
