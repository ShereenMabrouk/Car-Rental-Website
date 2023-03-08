
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
include("developers3.php");



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
      
<div class="container">
               <div class="text-center">     
               <?php echo $deleteMsg??''; ?>
   
      <table class="table table-bordered styled-table">
       <thead>
       	<tr>
         <th>Office ID</th>
         <th>Office Location</th> 
         
         <th>     </th>
         
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;

      foreach($fetchData as $data){
      	
    ?>
    
      <tr>
     
      <td ><?php echo $data['officeid']??''; ?></td>
       
      <td><?php echo $data['officeloc']??''; ?></td>
     


      <td><a href="deleteoffice.php?officeid=<?php echo $data['officeid']?>">Delete</a> </td>
       
     </tr>
   
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
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