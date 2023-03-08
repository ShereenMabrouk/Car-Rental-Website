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
<!DOCTYPE html>
<html lang="en">
<head>

     <title> View Reservation</title>

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
<form method="POST" id="contact-form">
<div class="col-md-12 col-sm-12">
  
  <input type="text" onfocus="(this.type = 'date')" id="firstd" name="firstd" placeholder="Enter Rental Date" class="form-control">
  
  <input type="text" onfocus="(this.type = 'date')" id="secondd" name="secondd" placeholder="Enter Return Date"class="form-control" >

  
  <input type="text" id="plateid" name="plateid" class="form-control" placeholder="Filter by Plate ID">

  <input type="text" id="models" name="models" class="form-control" placeholder="Filter by Model">
 
  <input type="number" id="dailypayment1" name="dailypayment1" class="form-control" placeholder="Filter by Payment From">
 
  <input type="number" id="dailypayment2" name="dailypayment2"class="form-control" placeholder="Filter by Payment To">

  <input type="number" id="officeid" name="officeid" class="form-control" placeholder="Filter by Office ID">
  
  <input type="text" id="status" name="status" class="form-control" placeholder="Filter by Status">
  
  <input type="number" id="miles" name="miles" class="form-control" placeholder="Filter by Milage From">
 
  <input type="number" id="miles2" name="miles2"class="form-control" placeholder="Filter by Milage TO">

  <input type="text" id="colors" name="colors"class="form-control" placeholder="Filter by Color" >
   
  <input type="text" id="ssn" name="ssn"class="form-control" placeholder="Filter by Customer's SSN" >

  <input type="text" id="fname" name="fname"class="form-control" placeholder="Filter by Customer's First Name" >

  <input type="text" id="lname" name="lname"class="form-control" placeholder="Filter by Customer's Last Name" >

  <input type="email" id="email" name="email"class="form-control" placeholder="Filter by Customer's Email" >

</div>
  <div class="col-md-4 col-sm-12">
  <input type="submit" name="button1" value="Filter" class="form-control" onclick="myFunction()">
  </div>
</form>

<script>

  function myFunction() {
    document.getElementById("firstd").defaultValue = "2013-05-08";
    document.getElementById("secondd").defaultValue = "2013-05-08";
   
   document.getElementById("dailypayment1").defaultValue = "-1";
    document.getElementById("dailypayment2").defaultValue = "999999999";

    document.getElementById("miles").defaultValue = "0";
    document.getElementById("miles2").defaultValue = "9999999";
    
  }
</script>
<?php

// $stat = check_status($fetchData);

include("developers5.php");
// if (array_key_exists('button1', $_POST)) {
//   $stat = check_status($fetchData);
// }
if (array_key_exists('button1', $_POST)) {
  $fetchData = filter($db, $tableName, $columns);

 if($fetchData!="No Data Found")
 { $stat = check_status($fetchData);}
}
?>
</div>
<div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <br><br><br>
                              <img src="images\blog-5-720x480.jpg" class="img-responsive" alt="">
                              <br><br>
                              <img src="images\offer-6-720x480.jpg" class="img-responsive" alt="">
                         </div>
                    </div>


</div></div>
          </section>
<section>         
<div class="container">
               <div class="text-center">     
               <?php echo $deleteMsg ?? ''; ?>
          <table class="table table-bordered styled-table">
            <thead>
              <tr>
                <th>Reservation Number</th>
                <th>Plate ID</th>
                <th>Customer SSN</th>
                <th>Office ID</th>
                <th>Date of Rental</th>
                <th>Date of return</th>
                <th>price</th>
                <th> </th>
                <th> </th>
                


            </thead>
            <tbody>
              <?php
              if (is_array($fetchData)) {
                $sn = 1;

                $i = 0;

                foreach ($fetchData as $data) {

              ?>

                  <tr>

                    <td><?php echo $data['reservation_number'] ?? ''; ?></td>
                    <td><?php echo $data['plateid'] ?? ''; ?></td>

                    <td><?php echo $data['customerssn'] ?? ''; ?></td>
                    <td><?php echo $data['officeid'] ?? ''; ?></td>
                    <td><?php echo $data['daterental'] ?? ''; ?></td>
                    <td><?php echo $data['datereturn'] ?? ''; ?></td>
                    <td><?php echo $data['price'] ?? ''; ?></td>
                    <td><?php echo $stat[$i] ?? ''; ?></td>

                    <td><a href="deletereservation.php?reservation_number=<?php echo $data['reservation_number']?>">Delete Reservation</a> </td>
                    


                  </tr>

                <?php
                  $i = $i + 1;
                  $sn++;
                }
              } else { ?>
                <tr>
                  <td colspan="8">
                    <?php echo $fetchData; ?>
                  </td>
                <tr>
                <?php
              } ?>
            </tbody>
          </table>
               </div></div>
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