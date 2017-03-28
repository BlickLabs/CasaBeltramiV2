<?php
    include "config.php";
    session_start();
     error_reporting(0);
    if (isset($_SESSION['user_name']) != "") {
        header("Location: principal.php");
    }
    if (isset($_POST['btn-login'])) {
        $email = $_POST['email'];
        $pass =$_POST['pass'];
        $email = trim($email);
        $query = "SELECT user FROM Users WHERE user='$email' AND password='$pass'";
        $result = mysqli_query($mysqli, $query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if ($num_row >= 1) {
            $_SESSION['user_name'] = $row['user'];
            header("Location: principal.php");
        } else {
           $result='<div class="alert alert-error">Lo sentimos! Usuario y/o constraseña son invalidos</div>';
        }
    }
?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Inicio De Sesión</title>
	<meta name="description" content="Bootstrap Metro Dashboard"/>
	<meta name="author" content="Dennis Ji"/>
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"/>
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<!-- end: Mobile Specific -->
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css_template/bootstrap.min.css" rel="stylesheet"/>
	<link href="css_template/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link id="base-style" href="css_template/admin.css" rel="stylesheet"/>
        <link rel="icon" type="image/png" sizes="32x32" href="favicon.png"></link>
	<link id="base-style-responsive" href="css_template/style-responsive.css" rel="stylesheet"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'/>
	<!-- end: CSS -->
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="favicon.png">
	<!-- end: Favicon -->
	<style type="text/css">
            body { background: url(img/bg-login.jpg) !important; }
        </style>
    </head>
<body>
    <div class="container-fluid-full">
        <div class="row-fluid">
           
            <div class="row-fluid">
                 
                <div class="login-box">
                    <div>
                        <?php echo $result; ?>    
                    </div>
                    <div class="icons">
                        <a href="index.html"><i class="halflings-icon home"></i></a>
                        <a href="#"><i class="halflings-icon cog"></i></a>
                    </div>
                        <h2>Iniciar Sesión</h2>
                           
                            <form class="form-horizontal"  method="post">
                                
                                <div class="input-prepend" title="Username">
                                    <span class="add-on"><i class="halflings-icon user"></i></span>
                                    <input class="input-large span10" name="email" type="text" placeholder="Usuario"/>
                                </div>
                                <div class="input-prepend" title="Password">
                                    <span class="add-on">
                                        <i class="halflings-icon lock"></i>
                                    </span>
                                    <input class="input-large span10" name="pass"  type="password" placeholder="Contraseña"/>
                                </div>
                        <label class="remember" for="remember">
                                   <a  href="reset_password.php"><h3>¿Olvidaste tu contraseña?</h3></a>
                                </label>

                                <div class="button-login">	
                                    <button type="submit" class="btn btn-primary" name="btn-login">Iniciar Sesión</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                            
                            
                            	
                </div><!--/span-->
            </div><!--/row-->
	</div><!--/.fluid-container-->
    </div><!--/fluid-row-->
	
	<!-- start: JavaScript-->
            <script src="js_template/jquery-1.9.1.min.js"></script>
            <script src="js_template/jquery-migrate-1.0.0.min.js"></script>
            <script src="js_template/jquery-ui-1.10.0.custom.min.js"></script>
            <script src="js_template/jquery.ui.touch-punch.js"></script>
            <script src="js_template/modernizr.js"></script>
            <script src="js_template/bootstrap.min.js"></script>
            <script src="js_template/jquery.cookie.js"></script>
            <script src='js_template/fullcalendar.min.js'></script>
            <script src='js_template/jquery.dataTables.min.js'></script>
            <script src="js_template/excanvas.js"></script>
            <script src="js_template/jquery.flot.js"></script>
            <script src="js_template/jquery.flot.pie.js"></script>
            <script src="js_template/jquery.flot.stack.js"></script>
            <script src="js_template/jquery.flot.resize.min.js"></script>
            <script src="js_template/jquery.chosen.min.js"></script>
            <script src="js_template/jquery.uniform.min.js"></script>
            <script src="js_template/jquery.cleditor.min.js"></script>
            <script src="js_template/jquery.noty.js"></script>
            <script src="js_template/jquery.elfinder.min.js"></script>
            <script src="js_template/jquery.raty.min.js"></script>
            <script src="js_template/jquery.iphone.toggle.js"></script>
            <script src="js_template/jquery.uploadify-3.1.min.js"></script>
            <script src="js_template/jquery.gritter.min.js"></script>
            <script src="js_template/jquery.imagesloaded.js"></script>
            <script src="js_template/jquery.masonry.min.js"></script>
            <script src="js_template/jquery.knob.modified.js"></script>
            <script src="js_template/jquery.sparkline.min.js"></script>
            <script src="js_template/counter.js"></script>
            <script src="js_template/retina.js"></script>
            <script src="js_template/custom.js"></script>
	<!-- end: JavaScript-->
    </body>
</html>