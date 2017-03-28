<?php
    include "config.php";
    error_reporting(E_ALL);
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: admin.php");
    }       
    $mail = $_SESSION['user_name'];
    $query2 = "SELECT nombre FROM Users WHERE user='$mail'";
    $res = mysqli_query($mysqli, $query2);
    $mysqli->close(); //cerramos la conexió
    $num_row = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
    $myuser=$row['nombre'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Imagenes Registradas</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css_template/bootstrap.min.css" rel="stylesheet">
	<link href="css_template/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
        
        
	<link id="base-style" href="css_template/admin.css" rel="stylesheet">
          <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
	<link id="base-style-responsive" href="css_template/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css_template/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css_template/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
                            <a class="brand" href="index.html"><span><h2><img src="img/icons/Logo-no-text.png" style="height: 60px"></h2></span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
				
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> 
                                                                <?php echo $myuser ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Opciones</span>
								</li>
								
								<li><a href="logout.php?logout"><i class="halflings-icon off"></i> Cerrar Sesión</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="images.php"><i class="icon-upload-alt"></i><span class="hidden-tablet">&nbsp;Subir Imagenes</span></a></li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-tags"></i><span >Galería por Salones</span></a>
							<ul>
                                <li><a class="submenu" href="Lincantos_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">L’incanto</span></a></li>
                                <li><a class="submenu" href="Farfalas_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Farfala</span></a></li>
                                <li><a class="submenu" href="Bambinos_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Bambinos</span></a></li>
							</ul>	
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-tags"></i><span >Galería por Servicios</span></a>
							<ul>
		                        <li><a class="submenu" href="floral_design_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Diseño floral</span></a></li>
		                        <li><a class="submenu" href="tables_sweets_cheeses_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Mesas de postres y quesos</span></a></li>
		                        <li><a class="submenu" href="rent_furniture_services_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Renta de mobiliario</span></a></li>
								
							</ul>	
                    </li>
                    <li><a href="gallery_by_event.php"><i class="icon-picture"></i><span class="hidden-tablet"> Galería Por Eventos</span></a></li>
                                            
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
						
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
                                        <a href="principal.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
                                <li><a href="#"><i class="icon-upload-alt"></i>&nbsp;Imagenes</a></li>
			</ul>

			<div class="row-fluid">
			 <p>
                            <center>
                                <a href="create_file.php" class="btn btn-primary btn-md mar-topbtn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Añadir Nueva Imagen</a><br/>
                            </center>
            </p>
            <table id="example" class="display table table-bordered table-stripe" cellspacing="4"  style="margin-top: 50px">
                <thead >
                    <tr >
<!--                        <th style="text-align: center">ID</th>-->
                        <th style="text-align: center">Titulo</th>
                        <th style="text-align: center">Imagen</th>
                        <th style="text-align: center">Estatus</th>
                        <th style="text-align: center">Última modificación</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $res = $mysqli2->query("SELECT * FROM content order by id_content desc");
                        $mysqli2->close();
                        while ($row = $res->fetch_assoc()):
                    ?>
                        <tr>
<!--                            <td style="text-align: center;" width="2%" class="mar-toptable"><?php echo $row['id_content'] ?></td>-->
                            <td style="text-align: center;"width="8%"><?php echo $row['tittle'];  ?></td>
                            <td width="10%"><img class="grayscale center-block" src="<?php echo 'php/album/' . $row['route'];?>" style="width: 250px;"></td>
                            <td style="text-align: center;padding-top: 70px" width="5%">
                                <?php 
                                        echo $row['status'] ? 'Activo':'Inactivo';
                                 ?>
                            </td>
                           <td style="text-align: center;padding-top: 70px" width="5%"><?php 
                                        echo $row['modification_date'] ?$row['modification_date']:$row['creation_date'];
                                 ?></td>
                            
                            
                            
                        </tr>
             
                        <?php
                            endwhile;
                        ?>
                    
                </tbody>
            </table>

			</div><!--/row-->
			
			
		
			<hr>
		
			

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>
		<p>
        	<span style="text-align:left;float:left">&copy; 2016 <a href="http://blick.mx/">Blick</a></span>
      	</p>
	</footer>
	
	<!-- start: JavaScript-->
       
		<script src="js_template/jquery-1.9.1.min.js"></script>
	<script src="js_template/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js_template/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js_template/jquery.ui.touch-punch.js"></script>
	
		<script src="js_template/modernizr.js"></script>
	
		<script src="js_template/bootstrap.min.js"></script>
	
		<script src="js_template/jquery.cookie.js"></script>
	
		<script src='js_template/fullcalendar.min.js'></script>
	
		

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
                <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
             
        <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
        <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {
                 $('#example').DataTable();
            } );

        </script>
	<!-- end: JavaScript-->
	
</body>
</html>
