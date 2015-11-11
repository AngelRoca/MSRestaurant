<?php session_start() ?>
<?php if(isset($_SESSION['nombre']))
{
require_once("Conexion.php");
require_once("crud.php");		
}else{
	header("Location: login.php");
}

$active="admin";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Restaurante V.1.0</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css"> 
       
    <link href="ui/css/bootstrap.min.css" rel="stylesheet" media="screen">		
		
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
   
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
    <?php include('header.php')?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
     
     
     
     <?php
     //incluiremos el menu de admin
     include('menuAdmin.php');
      ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
              <div class="col-lg-12 main-chart">
				<div class="row mt">
				
				<?php

$mensaje=null;
	if(isset($_POST["updateUsuario"])){
	
		$idusuario=$_POST["idusuario"];
		
		$nombre=$_POST["nombre"];
		$contra=$_POST["pass"];
		$nivel=$_POST["nivel"];
	
		
		//actualizando registro
	    $model = new Crud;
		$model->update = "usuarios";
		$model->set="nombre='$nombre', pass='$contra', nivel='$nivel'";
		$model->condition = "idusuario=$idusuario";
		$model->Update();
		$mensaje=$model->mensaje;
		
	}

if(isset($_REQUEST["idusuario"])){
	
		$idusuario = htmlspecialchars($_REQUEST["idusuario"]);
		
		$model = new Crud;
		$model->select = '*';
		$model->from = 'usuarios';
		
		$model->condition = "idusuario = $idusuario";
		$model->Read();
		//echo"<h1>$idproducto</h1>";
		$filas=$model->rows;
		
		foreach($filas as $fila){
		
			$nombre=$fila["nombre"];
			$contra=$fila["pass"];
			$nivel=$fila["nivel"];			
		}	
	}//fin del if
	
	
		
	

?>
				<div class="col-lg-4" >
          		<?php echo $mensaje; ?> <br> 
          		<a href="admin.php">Regresar a los Usuarios</a>
          		<form class="form-horizontal style-form" name="formUsuarios" id="formUsuarios" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          		<div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Nombre del Usuario</label>
                              <div class="col-sm-8">
                                  <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $fila["nombre"];?>">
                              </div>
                 </div><!--fin del form group-->
                 <div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Contraseña del Usuario</label>
                              <div class="col-sm-8">
                                  <input type="text" name="pass" id="pass" class="form-control" value="<?php echo $fila["pass"];?>">
                              </div>
                 </div><!--fin del form group-->
                 <div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Nivel del Usuario</label>
                              <div class="col-sm-8">
                                  <input type="text" name="nivel" id="nivel" class="form-control" value="<?php echo $fila["nivel"];?>">
                              </div>
                 </div><!--fin del form group-->
                 
                 
                <input type="hidden" name="updateUsuario">
                <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                
                <button class="btn btn-theme02" type="submit"><i class="fa fa-check"></i> Actualizar Usuario</button>
          		</form><!--FIN DEL FORM-->
          		
          		</div><!--fin del col lg 6-->



				
				
				</div>
              </div>
				                 
                 
                  
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      
      <footer class="site-footer">
          <div class="text-center">
              Sistema de Restaurante  - Alejandra Larrañaga
              <a href="admin.php" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
    
		<script src="ui/js/custom.js"></script>
    

   
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

  </body>
</html>
