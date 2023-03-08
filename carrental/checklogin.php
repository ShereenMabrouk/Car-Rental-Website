
<?php
function check_login($con)
{
	if(isset($_SESSION['email']))
	{
		$email=$_SESSION['email'];
		if($email=="omar@gmail.com")
		{
			$user_data['ssn']='admin';
			return $user_data;

		}
		
else{
		$query="select*from customer where email='$email' limit 1";
		$result=mysqli_query($con,$query);
		if ($result&& mysqli_num_rows($result)>0)
		{
			$user_data=mysqli_fetch_assoc($result);
			return $user_data;
		}}
	}
	//redirect to login
	header("Location:login.html");
	die;
}

?>