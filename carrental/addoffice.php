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

	$officeid=$_POST['officeid'];
	$officeloc=$_POST['officeloc'];


    $query = "select * from office where officeid='$officeid' limit 1";
	$result=mysqli_query($con,$query);
	if(!($result && mysqli_num_rows($result)>0))
	{
	$query = "insert into office(officeid,officeloc) values('$officeid','$officeloc')";

	mysqli_query($con,$query);
	header("Location:viewoffices.php");
	die;
	}

	else 
		{
			//echo "officeid already exists";
               echo '<script>alert("officeid already exists")</script>';
			
		}

	

}


?>

</html>

<!DOCTYPE html>
<html lang="en">
<head>

     <title> Add Office</title>

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
                                   
                                   <input type="text" class="form-control" placeholder="Office ID" name="officeid" required>
                                   <input type="text" class="form-control" placeholder="Office Location" name="officeloc" required>
								   
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="add office" value="Add Office">
                              </div>

                         </form>
                    
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="images\offer-6-720x480.jpg" class="img-responsive" alt="">
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