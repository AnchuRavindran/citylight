<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Citylight travels</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="./assets/css/style.css">


  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  </head>
  <body>
    
  <section id="header">
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar  ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a href="./index.php" class="logo navbar-brand" id="nava" ><img  id="navlogo" src="./assets/img/logo.png" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="./index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="./about.php" class="nav-link">About</a></li>
		  <li class="nav-item"><a href="./services.php" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="./tour.php" class="nav-link">Tour Packages</a></li>
          <li class="nav-item"><a href="./gallery.php" class="nav-link">Gallery</a></li>
          <li class="nav-item"><a href="./bus.php" class="nav-link">Bus</a></li>
          <li class="nav-item"><a href="./contact.php" class="nav-link">Contact</a></li>
          
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9  text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Tour</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Tour Details</h1>
          </div>
        </div>
      </div>
    </div>




    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tbltourpackages where PackageId=:pid";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide" style="height:90vh;width: 50vh;">
                  <img  src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
                </div>

                <!-- <div class="swiper-slide">
                  <img src="./assets/img/a3.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="./assets/img/b1.jpeg" alt="">
                </div> -->

              </div>
              <!-- <div class="swiper-pagination"></div> -->
            </div>
          </div>

          <div class="col-lg-6"   >
            <div class="portfolio-info">
              <h3>Package information</h3>
              <ul>
              
                <li>#PKG- <?php echo htmlentities($result->PackageId);?></li>
                <li><strong>Place</strong>: <?php echo htmlentities($result->PackageName);?></li>
                <li><strong>PackageType</strong>: <?php echo htmlentities($result->PackageType);?></li>
                <li><strong>Loacation</strong>: <?php echo htmlentities($result->PackageLocation);?>n</li>
                <li><strong>Features</strong>: <?php echo htmlentities($result->PackageFetures);?></li>
                <li><strong>Cost</strong>: <?php echo htmlentities($result->PackagePrice);?></li>

              </ul>
            
            
              <h2>Description</h2>
              <p>
                <?php echo htmlentities($result->PackageDetails);?> 
              </p>
              <div class="row" >
          <div class="col-lg-12">
              <div class="more_place_btn text-center"  >
                  <a id="more" class="boxed-btn4"  href="./tourbookform.php?pkgId=<?php echo $result->PackageId?>">Book</a>
              </div>
          </div>
      </div>
           
          </div>

        </div>
        <?php }} ?>
       


      </div>
    </section><!-- End Portfolio Details Section -->
      



        </div>
      </div>
    </section> <!-- .section -->

    <section id="footer">
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
				<a href="./index.php" class="logo navbar-brand"><img src="./assets/img/logo.png" alt="Logo" style="width:70%;height:100%;"></a>
              <p>If you are looking for a reliable tour operator in Kerala “CityLight Travels” is the right choice for you.Travel to Kerala with CityLight Travels and enjoy a perfect Holiday.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Useful Links</h2>
              <ul class="list-unstyled">
				<li><a href="./index.php" class="py-2 d-block">Home</a></li>
                <li><a href="./about.php" class="py-2 d-block">About</a></li>
                <li><a href="./services.php" class="py-2 d-block">Services</a></li>
                <li><a href="./tour.php" class="py-2 d-block">Tour packages</a></li>
                <li><a href="./gallery.php" class="py-2 d-block">Gallery</a></li>
                <li><a href="./bus.php" class="py-2 d-block">Buses</a></li>
                <li><a href="./contact.php" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="./services.php" class="py-2 d-block">Holiday Package</a></li>
                <li><a href="./services.php" class="py-2 d-block">Bus Services</a></li>
                <li><a href="./services.php" class="py-2 d-block">Convenient Payment Method</a></li>
                <li><a href="./services.php" class="py-2 d-block">Airline Tickets</a></li>
                <li><a href="./services.php" class="py-2 d-block">Document Attestation</a></li>
				<li><a href="./services.php" class="py-2 d-block">Visa Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
					<p>
						Bus Stand Exit, <br>Taliparamba,Kannur<br> Kerala 670141<br><br>
						 <a href="tel:+91 9048001100">+91 9048001100</a><br>
						<a href="mailto:citylighttravels.kerala@gmail.com"> citylighttravels.kerala@gmail.com</a>
				
	            </div>
            </div>
          </div>
        </div>
       
      </div>
    </footer>
    
  </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/range.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="./assets/js/main.js"></script>
    
  </body>
</html>














     