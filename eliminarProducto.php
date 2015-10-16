
<?php
$mensaje=null;


if(isset($_POST["deleteProducto"])){

	$id_producto = htmlspecialchars($_POST["id_producto"]);
	
	
		$model = new Crud;
		$model->deleteFrom="productos";
		$model->condition="idproducto=$id_producto";
		$model->Delete();
		$mensaje = $model->mensaje;
	
	
	
}//fin del isset	

?>

          		<div class="col-lg-12" >
          		
          		
          		<h3>Eliminar Producto</h3>
          		
          		<?php echo $mensaje; ?><br> 
          		<a href="productos.php">Regresar a los productos</a> 
          		<?php if(isset($_GET["idproducto"])) { ?>
          		
  <form class="form-horizontal style-form" name="formUpdateProducto" id="formUpdateProducto" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
          		    <h3>Desea eliminar este registro? <?php //echo htmlspecialchars($_GET["idproducto"]);?> </h3>
                <input type="hidden" name="deleteProducto">
                 <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($_GET["idproducto"]);?>">
                 
                <button class="btn btn-theme02" type="submit"><i class="fa fa-check"></i> Eliminar Producto</button>
          		</form><!--FIN DEL FORM-->
          		<?php } // fin del if ?>
          		</div><!--fin del col lg 6-->

