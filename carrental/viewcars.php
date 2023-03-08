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

     <title> View Cars</title>

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

  
  <input type="text" id="locs" name="locs" class="form-control" placeholder="Filter by Location">

  <input type="text" id="models" name="models" class="form-control" placeholder="Filter by Model">
 
  <input type="number" id="years" name="years" class="form-control" placeholder="Filter by year From">
 
  <input type="number" id="years2" name="years2"class="form-control" placeholder="Filter by year TO">
  
  <input type="number" id="miles" name="miles" class="form-control" placeholder="Filter by Milage From">
 
  <input type="number" id="miles2" name="miles2"class="form-control" placeholder="Filter by Milage TO">
 
  <input type="number" id="ccs" name="ccs" class="form-control" placeholder="Filter by Enfine Size From">

  <input type="number" id="ccs2" name="ccs2" class="form-control" placeholder="Filter by Enfine Size TO">
  <input type="number" id="pay1" name="pay1" class="form-control" placeholder="Filter by Daily payment From">

                                   <input type="number" id="pay2" name="pay2" class="form-control" placeholder="Filter by Daily payment TO">
  <input type="text" id="colors" name="colors"class="form-control" placeholder="Filter by Color" ></div>
  <div class="col-md-4 col-sm-12">
  <input type="submit" name="button1" value="Filter" class="form-control" onclick="myFunction()">
  </div>
</form>

<script>
  function myFunction() {
     document.getElementById("pay1").defaultValue = "-1";
                                   document.getElementById("pay2").defaultValue = "100000000";
    document.getElementById("firstd").defaultValue = "2013-05-08";
    document.getElementById("secondd").defaultValue = "2013-05-08";
    document.getElementById("years").defaultValue = "2000";
    document.getElementById("years2").defaultValue = "2030";
    document.getElementById("miles").defaultValue = "0";
    document.getElementById("miles2").defaultValue = "9999999";
    document.getElementById("ccs").defaultValue = "100";
    document.getElementById("ccs2").defaultValue = "6000";
  }
</script>
<?php

include("developers2.php");

if (array_key_exists('button1', $_POST)) {
  $fetchData = filter($db, $tableName, $columns);
  if ($fetchData != "No Data Found") {
    $stat = check_status($fetchData);
  }
}
?>

</div>
<div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <br><br><br><br><br><br>
                              <img src="images\blog-6-720x480.jpg" class="img-responsive" alt="">
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
                <th>Plate ID</th>
                <th>Model</th>
                <th>Status</th>
                <th>Office ID</th>
                <th>Daily Payement</th>
                <th>Milage</th>
                <th>Color</th>
                <th> </th>
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

                    <td><?php echo $data['plateid'] ?? ''; ?></td>

                    <td><?php echo $data['model'] ?? ''; ?></td>
                    <td><?php echo $data['status'] ?? ''; ?></td>
                    <td><?php echo $data['officeid'] ?? ''; ?></td>
                    <td><?php echo $data['dailypayment'] ?? ''; ?></td>
                    <td><?php echo $data['milage'] ?? ''; ?></td>
                    <td><?php echo $data['color'] ?? ''; ?></td>
                    <td><?php echo $stat[$i] ?? ''; ?></td>

                    <td><a href="deletecar.php?plateid=<?php echo $data['plateid'] ?>">Delete</a> </td>
                    <td><a href="outofservice.php?plateid=<?php echo $data['plateid'] ?>">Toggle service</a> </td>


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