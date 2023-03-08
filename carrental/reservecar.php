
<?php
session_start();

include("connection.php");
include("checklogin.php");
$user_data=check_login($con);

if($user_data['ssn']=="admin")
{
  header("Location: indexadmin.php");
die;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>

     <title> Reservation details</title>

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
     <link  href="stylee.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">
     
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
  

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

<section id="contact">
<div class="container">
               <div class="row">

      <div class="col-md-6 col-sm-12">
<form method="POST" id="contact-form" onsubmit="developers4.php">
<div class="col-md-12 col-sm-12">
  
  <input type="text" onfocus="(this.type = 'date')" id="daterentalreserve" name="daterentalreserve" placeholder="Starting Date of Rental" class="form-control">
  
  <input type="text" onfocus="(this.type = 'date')" id="datereturnreserve" name="datereturnreserve" placeholder="Ending Date of Rental"class="form-control" >

  
 </div>
  <div class="col-md-4 col-sm-12">
  <input type="submit" name="search" value="Reserve" class="form-control" id="button1"onclick="return checkd();">
  </div>
</form>
<script>
                              function checkd() {
                                   var date =
                                        document.getElementById('daterentalreserve').value;
                                   var datee =
                                        document.getElementById('datereturnreserve').value;
                                   var date1 = new Date(date);
                                   var date2 = new Date(datee);
                                   var currDate = new Date();

                                   if (currDate > date1 || date2 < date1) {
                                        alert("You have entered an invalid date");
                                        return false;
                                   }
                              }
                         </script>
</div></div></div>
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

</html>


<?php
include("developers2.php");
if (array_key_exists('button1', $_POST)) {
  $stat = check_status($fetchData);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $daterental = $_POST['daterentalreserve'];
    $datereturn = $_POST['datereturnreserve'];
 
    
    if (isset($_GET['plateid'])) {

      $plateid = $_GET['plateid'];

$query0 = "select * from reservations where plateid ='$plateid' AND (('$daterental' BETWEEN daterental AND datereturn) OR ('$datereturn' BETWEEN daterental AND datereturn) OR (datereturn BETWEEN '$daterental' AND '$datereturn') OR (daterental BETWEEN '$daterental' AND '$datereturn'))";


      $result0 = mysqli_query($con, $query0);

   if ($result0&& mysqli_num_rows($result0)>0)
      {
               echo '<script>alert("Date unavailable")</script>';
     //    header("Location:customerreserve2.php");

                              echo "<script>window.location.href='customerreserve2.php';</script>";

                              // echo "<script>process.chdir('/tmp');
                              // console.log('New directory: ' + process.cwd());</script>";


               die;
      }



      // = "select * from specs where model='$model' ";
      $query1 = "select * from car where plateid='$plateid' limit 1";
      $result = mysqli_query($con, $query1);
      $office = mysqli_fetch_assoc($result);
      $officeid = $office['officeid'];
      //echo $car_data['plateid'];
      //$officeid=$car_data['plateid'];

      //echo $user_data['ssn'];
      $ssn = $user_data['ssn'];
      //$price=10;
      $inquery = "insert into reservations (plateid,customerssn,officeid,daterental,datereturn) 
values('$plateid'
,'$ssn'
,'$officeid',
'$daterental'
, '$datereturn')";
 
      mysqli_query($con, $inquery);
     //  header("Location:myreservations.php");

     echo "<script>window.location.href='myreservations.php';</script>";


          exit();
    }
  }

?>