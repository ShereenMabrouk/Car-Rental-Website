<?php
session_start();

include("connection.php");
include("checklogin.php");
$admin=check_login($con);
if($admin['ssn']!='admin')
{
  header("Location:indexcustomer.php");
die;
}

?>

<?php  

include("connection.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{


    $plateid=$_POST['plateid'];
	$model=$_POST['model'];
	$status=$_POST['status'];
	$officeid=$_POST['officeid'];
	$dailypayment=$_POST['dailypayment'];
	$color=$_POST['color'];
	$milage=$_POST['milage'];
	

    $query1 = "select * from specs where model='$model' limit 1";
	$result1=mysqli_query($con,$query1);

	$query2 = "select * from car where plateid='$plateid' limit 1";
	$result2=mysqli_query($con,$query2);

	$query3 = "select * from office where officeid='$officeid' limit 1";
	$result3=mysqli_query($con,$query3);

	


	if(!($result1 && mysqli_num_rows($result1)>0))
	{
		//echo "model does not exist";
          echo '<script>alert("model does not exist")</script>';
	 //header("Location:addmodel.php");
	}

	else if( !($result3 && mysqli_num_rows($result3)>0))
	{
		//echo "office does not exist";
          echo '<script>alert("office does not exist")</script>';
	 //header("Location:addoffice.php");

	}

	

	else if(($result2 && mysqli_num_rows($result2)>0))

	{
		//echo "plate id already exists";
          echo '<script>alert("plate id already exists")</script>';
	}
	else{
		$query = "insert into car(plateid,model,status,officeid,dailypayment,milage,color) values('$plateid','$model','$status','$officeid','$dailypayment','$milage','$color')";
	

	mysqli_query($con,$query);

     header("Location:viewcars.php");

		
	}

	
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title> Add Car</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">
     <script src="myscripts.js"></script>
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>
	   <!-- MENU -->
	   <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Car Rental Website</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.html">Home</a></li>
						 <li><a href="indexadmin.php">Back</a></li>
                        
                    </ul>
               </div>

          </div>
</section>

 

     <!-- Login -->
     <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
					<form name="form2" id="contact-form" role="form"  method="post">
                              <div class="col-md-12 col-sm-12">
                                   
                                   <input type="text" class="form-control" placeholder="Plate ID" name="plateid" required>
                                   <input type="text" class="form-control" placeholder="Model" name="model" required>
								   <select name="status"placeholder="Status" class="form-control" required>
								   <option value="" disabled selected>Select Status...</option>
									<option value="">Active</option>
									<option value="out_of_service">Out of Service</option>
									<option value="rented">Rented</option>
									</select>
									<input type="text" class="form-control" placeholder="Office ID" name="officeid" required>
									<input type="text" class="form-control" placeholder="Daily Payment" name="dailypayment" required>
									<input type="text" class="form-control" placeholder="Milage" name="milage" required>
									<input type="text" class="form-control" placeholder="Color" name="color" required>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="add car" value="Add Car">
                              </div>

                         </form>
                    
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <br><br>
                              <img src="images\blog-6-720x480.jpg" class="img-responsive" alt="">
                         </div>
                    </div>

               </div>
          </div>
     </section>       

 <!-- FOOTER -->
 <footer id="footer">
     <div class="container">
          <div class="row">

               <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                         <div class="section-title">
                              <h2>By</h2>
                         </div>
                         <address>
                              
                              <p>Omar Walied &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    7058 </p>
                              <p>Habiba Hefny &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   6939 </p>
                              <p>Shereen Mabrouk &nbsp;6844 </p>
                              <p>Hend Khaled  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   6986</p>
                         </address>

                         <ul class="social-icon">
                              <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                              <li><a href="#" class="fa fa-twitter"></a></li>
                              <li><a href="#" class="fa fa-instagram"></a></li>
                         </ul>

                         <div class="copyright-text"> 
                              <p>Copyright &copy; carrental project 2022 </p>

                         </div>
                    </div>
               </div>

               <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                         <div class="section-title">
                              <h2>Contact Info</h2>
                         </div>
                         <address>
                         
                              <p><a href="mailto:contact@company.com">carrentalegypt@company.com</a></p>
                         </address>

                         <div class="footer_menu">
                              <h2>Quick Links</h2>
                              <ul>
                                   <li><a href="index.html">Home</a></li>
                                   <li><a href="about-us.html">About Us</a></li>
                                   
                              </ul>
                         </div>
                    </div>
               </div>

               <div class="col-md-4 col-sm-12">
                    <div class="footer-info newsletter-form">

                         </div>
                    </div>
               </div>
               
          </div>
     </div>
</footer>



     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
     <script  src="./script.js"></script>

</body>