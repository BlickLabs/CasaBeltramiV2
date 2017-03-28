<?php
  include "config.php";
  error_reporting(E_ALL);
  session_start();
  if (!isset($_SESSION['user_name'])) {
      header("Location: admin.php");
  }
  $mail = $_SESSION['user_name'];
  $image = $_GET['u'];
  $type = "";
  $typeID = "";
  $query = "SELECT * FROM content WHERE id_content='$image'";
  $res = mysqli_query($mysqli, $query);
  $query2 = "SELECT nombre FROM Users WHERE user='$mail'";
  $res2 = mysqli_query($mysqli, $query2);
  $query3 = "SELECT id, id_decoration FROM content_decoration WHERE id_content = $image";
  $res3 = mysqli_query($mysqli, $query3);
  if (mysqli_num_rows($res3) > 0) {
    $type = "salon";
    $typeID = mysqli_fetch_array($res3)['id_decoration'];
  } else {
    $query3 = "SELECT id, id_sub_service FROM content_sub_service WHERE id_content = $image";
    $res3 = mysqli_query($mysqli, $query3);

    if (mysqli_num_rows($res3) > 0) {
      $type = "servicio";
      $typeID = mysqli_fetch_array($res3)['id_sub_service'];
    } else {
      $query3 = "SELECT id, id_event FROM content_event WHERE id_content = $image";
      $res3 = mysqli_query($mysqli, $query3);
      if (mysqli_num_rows($res3) > 0) {
        $type = "evento";
        $typeID = mysqli_fetch_array($res3)['id_event'];
      } else {
        header("Location: principal.php");
      }
    }
  }
  $mysqli->close(); //cerramos la conexió
  $num_row = mysqli_num_rows($res);
  $num_row2 = mysqli_num_rows($res2);
  $row = mysqli_fetch_array($res);
  $row2 = mysqli_fetch_array($res2);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Editar Datos de Imagen</title>
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
    <link id="base-style" href="css_template/admin.css" rel="stylesheet">
    <link id="base-style-responsive" href="css_template/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
    <link rel="shortcut icon" href="images/logo_gris.png">
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
          <a class="brand" href="principal.php">
            <span>
              <h2><img src="img/icons/Logo-no-text.png" style="height: 60px"></h2>
            </span>
          </a>
          <!-- start: Header Menu -->
          <div class="nav-no-collapse header-nav">
            <ul class="nav pull-right">
              <!-- start: User Dropdown -->
              <li class="dropdown">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="halflings-icon white user"></i>
                <?php echo $row2['nombre']; ?>
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
            <li><a href="images.php">Añadir Nueva Imagen</a></li>
          </ul>
          <h1 style="text-align: center">LLENA LOS SIGUIENTES CAMPOS</h1>
          <p><br/></p>
          <div class="panel panel-default">
            <div class="panel-body">
              <form  id="subida" class="form-horizontal">
                <input type="hidden" name="id_hidden" id="id_hidden" value="<?php echo $_GET['u']; ?>">
                <input type="hidden" name="type_hidden" id="type_hidden" value="<?php echo $type; ?>">
                <input type="hidden" name="type_id_hidden" id="type_id_hidden" value="<?php echo $typeID; ?>">
                <div class="control-group col-sm-5 mar-top40">
                  <label class="control-label" for="focusedInput">Titulo De la Imagen: </label>
                  <div class="controls">
                    <input class="input-xlarge focused" type="text" id="title" name="title" pattern="[^'\x22]+"
                      title="este campo no acepta caracteres especiales, solo letras"
                      value="<?php echo $row['tittle']; ?>">
                  </div>
                </div>
                <div class="control-group  col-sm-5 mar-top41" >
                  <h3>¿Qué tipo de foto es?</h3>
                  <input style="opacity:1" id="type_1" type="radio" name="picture_type" value="salon" <?php if($type=="salon") echo "checked"?>> <label for="type_1">Foto de salón</label>
                  <input style="opacity:1" id="type_2" type="radio" name="picture_type" value="servicio" <?php if($type=="servicio") echo "checked"?>> <label for="type_2">Foto de servicio</label>
                  <input style="opacity:1" id="type_3" type="radio" name="picture_type" value="evento" <?php if($type=="evento") echo "checked"?>> <label for="type_3">Foto de evento</label>
                  <br><br>
                  <label class="control-label" for="selectError">Categoría:</label>
                  <div class="controls" >
                    <select class="selectpicker" id="category" name="category" >
                      <optgroup label="" >
                        <option value="0"></option>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="control-group col-sm-5 mar-top41">
                  <label class="control-label" for="focusedInput">Descripción:</label>
                  <div class="controls">
                    <textarea class="input-xlarge focused" type="text" id="desc" name="desc"
                      id="desc" rows="8" style="resize:none"><?php echo $row['description']; ?></textarea>
                  </div>
                </div>

                <div class="control-group col-sm-5 mar-top41">
                  <label class="control-label" for="selectError">Estatus:</label>
                  <div class="controls">
                      <input style="opacity:1" id="status_1" type="radio" name="picture_status" value="1" <?php if ($row['status'] == 1) echo "checked"; ?>> <label for="status_1">Activo</label>
                      <input style="opacity:1" id="status_2" type="radio" name="picture_status" value="0" <?php if ($row['status'] == 0) echo "checked"; ?>> <label for="status_2">Inactivo</label>
                  </div>
                </div>

                <div class="form-group">
                </div>
                <center>
                  <a href="images.php" class="btn btn-primary btn-md mar-right"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span><i class="icon-arrow-left"></i>&nbsp; Regresar</a>
                  <button type="submit"  class="btn btn-success "><i class="icon-save"></i>&nbsp; Guardar</button>
                </center>
              </form>
            </div>
          </div>
        </div>
        <!--/.fluid-container-->
        <!-- end: Content -->
      </div>
      <!--/#content.span10-->
    </div>
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
    <script>
      $(document).ready(function () {
      	function callEvents(selectedID) {
       	$.ajax({
       	    url: "api.php",
       	    data: { search:"events" },
       	    context: document.body,
       	    success: function(json){
       	    	var response = jQuery.parseJSON(json);
       	    	$('#category').find('option').remove();
       	    	$('#category').find('optgroup').remove();
       	    	response.forEach(function (elem) {
                if (selectedID == elem['id_event']) {
                  $('#category').append('<option value="' + elem['id_event'] + '" selected>' + elem['event_name'] + '</option>');
                } else {
                  $('#category').append('<option value="' + elem['id_event'] + '">' + elem['event_name'] + '</option>');
                }
       	    	});
        	}
        });
       }
       function callDecorations(selectedID) {
       	$.ajax({
       	    url: "api.php",
       	    data: { search:"decorations" },
       	    context: document.body,
       	    success: function(json){
       	    	var response = jQuery.parseJSON(json);
       	    	$('#category').find('option').remove();
       	    	$('#category').find('optgroup').remove();
       	    	response.forEach(function (group) {
       	    		$('#category').append('<optgroup label="' + group['room_name'] + '">');
       	    		group['decorations'].forEach(function (elem) {
                  if (selectedID == elem['id_decoration']) {
                    $('#category').append('<option value="' + elem['id_decoration'] + '" selected>' + elem['decoration_name'] + '</option>');
                  } else {
                    $('#category').append('<option value="' + elem['id_decoration'] + '">' + elem['decoration_name'] + '</option>');
                  }
       	    		});
       	    		$('#category').append('</optgroup>');
       	    	});
       	    }
        });
       }
       function callSubservices(selectedID) {
        console.log(selectedID);
       	$.ajax({
       	    url: "api.php",
       	    data: { search:"subservices" },
       	    context: document.body,
       	    success: function(json){
       	    	var response = jQuery.parseJSON(json);
       	    	$('#category').find('option').remove();
       	    	$('#category').find('optgroup').remove();
       	    	response.forEach(function (group) {
       	    		$('#category').append('<optgroup label="' + group['service_name'] + '">');
       	    		group['subservices'].forEach(function (elem) {
       	    			if (selectedID == elem['id_subservice']) {
                    $('#category').append('<option value="' + elem['id_subservice'] + '" selected="true">' + elem['subservice_name'] + '</option>');
                  } else {
                    $('#category').append('<option value="' + elem['id_subservice'] + '">' + elem['subservice_name'] + '</option>');
                  }
       	    		});
       	    		$('#category').append('</optgroup>');
       	    	});
        	}
        });
       }
       <?php if($type=="salon") {?>
        callDecorations(<?php echo $typeID; ?>);
       <?php } else if($type=="servicio") {?>
        callSubservices(<?php echo $typeID; ?>);
       <?php } else { ?>
        callEvents(<?php echo $typeID; ?>);
       <?php } ?>
       $('[name="picture_type"').change(function () {
       	var type = $(this).val();
       	if (type == 'evento') {
       		callEvents();
       	} else if (type == 'servicio') {
       		callSubservices();
       	} else {
       		callDecorations();
       	}
       });
      });
      $(function(){

      	$('#subida').submit(function(){

      		var comprobar = $('#title').val().length *$('#desc').val().length*$('#id_hidden').val();

      		if(comprobar>0){

      			var formulario = $('#subida');

      			var datos = formulario.serialize();

      			var url = 'php/Update.php';

      			$.ajax({

      				url: url+'?'+datos,
      				type: 'POST',
      				beforeSend : function (){

      					$('#cargando').show(300);

      				},
      				success: function(data){
                window.location = "principal.php";
      					return false;
      				}

      			});

      			return false;

      		}else{

      			alert('Selecciona una foto para subir e ingrese su descripcion');

      			return false;

      		}
      	});
      });
    </script>
  </body>
</html>
