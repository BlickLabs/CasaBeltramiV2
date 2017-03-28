<?php
    include "api.php";
    $json = json_decode($json2, true); 
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sailor Corporate/Agency/Portfolio - Home Page</title>
    <meta name="description" content="Sailor is a Creative and Unique Corporate and Portfolio Web Template">
    <meta name="keywords" content="portfolio, creative, corporate, responsive, bootstrap">
    <meta name="author" content="JLT Media/ThemeForces">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">

    <!-- Other Css Files
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="font-awesome-4.2.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/jasny-bootstrap.min.css">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <!-- Google Fonts
    ================================================== -->
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Modernizr
    ================================================== -->
    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-target=".navbar-example">

    <!-- Preloader
    ================================================== -->


    <!-- Off Canvas Navigation
    ================================================== -->
    <div id="navigation" class="navmenu navmenu-default navmenu-fixed-left offcanvas"> <!--- Off Canvas Side Menu -->
      <a href="galery.html"><img src="img/menu-logo.png" alt="..." class="logo"></a> <!--- User Icon/ Or Logo Image -->
      <ul class="nav navmenu-nav"> <!--- Menu -->
        <li class="active"><a class="page-scroll" href="#hero">Home</a></li>
        <li><a class="page-scroll" href="#portfolio">Portfolio</a></li>
        <li><a class="page-scroll" href="#about">About Me</a></li>
        <li><a class="page-scroll" href="#blog">Blog</a></li>
        <li><a class="page-scroll" href="#contact">Contact Me</a></li>
      </ul><!--- End Menu -->
    </div> <!--- End Off Canvas Side Menu -->


    <!-- Hero Slider
    ================================================== -->
    <section id="hero"> 
        
        <!-- Menu Toggle for Off Canvas-Menu -->
        <div id="menu" class="menu" data-toggle="offcanvas" data-target=".navmenu">
            <img src="img/menu.png" alt="menu-logo">
        </div>

        <!--Start Sliders -->
        <div id="header-slider" class="carousel slide" data-ride="carousel">

          <!-- Hero Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <div class="item active"> <!-- First Slider -->
              <img src="img/bg/01.jpg" alt="...">
              <div class="carousel-caption">
                <h1>sailor</h1>
                <h4>One Page Minimal Web Design</h4>
                <a class="page-scroll" href="#portfolio"><span class="fa fa-angle-double-down fa-3x"></span></a>
              </div>
            </div> <!-- End First Slider -->

            <div class="item"> <!-- Second Slider -->
              <img src="img/bg/02.jpg" alt="...">
              <div class="carousel-caption">
                <h1>corporate</h1>
                <h4>Perfect for Corporate/Agency</h4>
                <a class="page-scroll" href="#portfolio"><span class="fa fa-angle-double-down fa-3x"></span></a>
              </div>
            </div><!-- End Second Slider -->

            <div class="item"> <!-- Third Slider -->
              <img src="img/bg/03.jpg" alt="...">
              <div class="carousel-caption">
                <h1>portfolio</h1>
                <h4>For Good Presentation of Business Website</h4>
                <a class="page-scroll" href="#portfolio"><span class="fa fa-angle-double-down fa-3x"></span></a>
              </div>
            </div><!-- End Third Slider -->

            <div class="item"> <!-- Fourth Slider -->
              <img src="img/bg/04.jpg" alt="...">
              <div class="carousel-caption">
                <h1>love this?</h1>
                <h4>Get it Now! For Only $12</h4>
                <a class="page-scroll" href="#form"><span class="fa fa-angle-double-down fa-3x"></span></a>
              </div>
            </div> <!-- End Fourth Slider -->
          </div> <!-- End Hero Wrapper for slides -->

        </div> <!-- End Sliders -->

        <div class="controls">
            <a href="#header-slider" role="button" data-slide="prev"><span class="arrow-left"></span></a> <!-- Prev Control -->
            <a href="#header-slider" role="button" data-slide="next"><span class="arrow-right"></span></a> <!-- Next Control -->
        </div>

    </section><!-- End Hero Slider -->


    <!-- Portfolio Section
    ================================================== -->
    <section id="portfolio"> 
        <div class="container-fluid"> <!-- Start Container -->
            <div class="row"> <!-- Start Row -->
                <?php
                    foreach ($json['images'] as $value) {
                        $path = $value['path'];
                        $tittle = $value['tittle'];
                        $short_description = $value['short_description'];
                        $img_details = json_encode($value);
                        $RequestText = urlencode($img_details);
                        if($count%3 == 0){
                ?>
                    <div class="col-sm-4 col-md-4 col-lg-4 nopadding"> <!-- First Column -->
                        <div class="small-box">
                            <div class="hover-bg">
                                <img src="<?php echo $path; ?>" alt="img" class="img-responsive img-standar">
                                <div class="hover-text animated">
                                    <div class="ptitle">
                                        <a href="image_description.php"><h2><?php echo $tittle; ?></h2></a>
                                    </div>
                                    <p class="excerpt"><?php echo $short_description; ?> </p>
                                    <a href="image_description.php?image=<?php echo $RequestText;?>" class="btn btn-default read-more-btn"><span class="fa fa-bars"></span>Ver más</a>
                                </div>
                            </div>
                        </div> 
                    </div>

                <?php  
                        }
                        else if($count%3 != 0)
                        {
                ?>
                        <div class="small-box">
                            <div class="hover-bg">
                                <img src="<?php echo $path; ?>" alt="img" class="img-responsive img-standar">
                                <div class="hover-text animated">
                                    <div class="ptitle">
                                        <a href="image_description.php"><h2><?php echo $tittle; ?></h2></a>
                                    </div>
                                    <p class="excerpt"><?php echo $short_description; ?> </p>
                                    <a href="image_description.php=<?php echo $RequestText;?>" class="btn btn-default read-more-btn"><span class="fa fa-bars"></span>Ver más</a>
                                </div>
                            </div>
                        </div> 
                <?php  
                        }      
                    $count++;
                    }
                ?>
            </div> <!-- End Row -->
        </div> <!-- End Container -->
        <div class="clearfix"></div>
    </section>
    



    <!-- Contact Section
    ================================================== -->
    <!--<section id="contact">

        <div class="container"> 
            <div class="row"> 
                <div class="col-md-10 col-md-offset-1">
                
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div id="form" class="contact-form">
                            <span class="coconut"></span>
                            <h5>Contact</h5>
                            <span class="fa fa-angle-double-down fa-2x"></span>
                            <div class="space"></div>
                            
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" autocomplete="off" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email.">                            
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            
                            <p>Pro laoreet principes liberavisse ne, has solum corpora ex, an his unum ipsum. Ad vix nominavi salutatus patrioque, ei molestie adversarium eum cu.</p>
                        </div>
                        <div class="text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-primary contact-btn">Send</button> 
                        </div>
                    </form>

                </div>
            </div> 
        </div>

    </section>-->



    <!-- Footer Section
    ================================================== -->
    <footer>
        <p class="copyright">© 2014 copyright. designed by  jlpmedia</p>
    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins)
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- Other JS Files -->
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/nivo-lightbox.js"></script>

    <!-- Contact page-->
    <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="js/contact.js"></script>

    <!-- Custom Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

  </body>
</html>