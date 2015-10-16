<?php
	
	//include("Conexion.php");
	//include('crud.php');
	$mensaje=null;

  $model = new Crud;
  $model->select = '*';
  $model->from = 'orden order by idorden DESC LIMIT 1';
  //$model->condition='idusuario=3';
  $model->Read();
  $filas = $model->rows;
  $total = count($filas);

  

	if(isset($_POST['insertarUsuario'])){
		$nombre = htmlspecialchars($_POST['nombre']);
		$pass = htmlspecialchars($_POST['pass']);
		$nivel = htmlspecialchars($_POST['nivel']);
		if(($nombre=='') || ($pass=='') || ($nivel=='')){$mensaje="Error todos los datos son requeridos";
		}else { 
		$model = new Crud;
		$model ->insertInto='usuarios';
		$model ->insertColumns='nombre,pass,nivel';
		$model ->insertValues ="'$nombre','$pass','$nivel'";
		$model ->Create();
		$mensaje=$model->mensaje;
		}
	}
?>
              <div class="row">
              <div class="col-lg-12">


              <div class="col-lg-5">
                            <h2>Id de la Orden:
                              <?php  
                              foreach($filas as $fila){
                              echo "<tr>";
                              $idnuevo=$fila['idorden'];
                              $idnuevo=$idnuevo+1;
                              echo "<td>".$idnuevo."</td>";
                              echo "<br />";
                              echo "<td>Estado: ".$fila['estado']."</td>";
                              
                              
                              echo "<td>";}?>

                            </h2>
              </div>
              <div class="col-lg-5">
              <?php 

               ?>
              <h4> <span> 
<?php
$miFecha= gmmktime(12,0,0,1,15,2089);
setlocale(LC_TIME, 'es_ES.UTF-8');
echo 'Fecha de la orden: '.strftime("%d/%m/%Y").'<br/>';


?>
              </span></h4>
              </div>
              </div>
</div>
          		<div class="col-lg-4" >
          		<?php echo $mensaje; ?> 
              
          		<form class="form-horizontal style-form" name="formUsuarios" id="formUsuarios" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          		<div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Producto</label>
                              <div class="col-sm-8">
                                  <input type="text" name="nombre" id="nombre" class="form-control">
                              </div>
                 </div><!--fin del form group-->
                 <div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Contraseña del Usuario</label>
                              <div class="col-sm-8">
                                  <input type="password" name="pass" id="pass" class="form-control" >
                              </div>
                 </div><!--fin del form group-->
                 <div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Nivel del Usuario</label>
                              <div class="col-sm-8">
                                  <input type="text" name="nivel" id="nivel" class="form-control">
                              </div>
                 </div><!--fin del form group-->
                 
                 
                <input type="hidden" name="nuevoPedido">
                 <input type="hidden" name="idnuevo" value="<?php echo $idnuevo; ?>">
                <button class="btn btn-theme02" type="submit"><i class="fa fa-check"></i> Crear nueva Orden!</button>
          		</form><!--FIN DEL FORM-->
          		
          		</div><!--fin del col lg 6-->


