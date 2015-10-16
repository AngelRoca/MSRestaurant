<?php
//SELECT * FROM productos INNER JOIN categorias ON productos.categorias_idcategoria=categorias.idcategoria INNER JOIN tipo ON productos.tipo_idtipo=tipo.idtipo;

	$model = new Crud;
	$model->select=
	'productos.idproducto as idproducto,productos.nombre as nombre,productos.precio,productos.disponibilidad,productos.imagen,categorias.idcategoria,categorias.nombre as cat,tipo.idtipo as idtipo,tipo.descripcion as descripcion';
	$model->from = 
	'productos INNER JOIN categorias ON productos.categorias_idcategoria=categorias.idcategoria INNER JOIN tipo ON productos.tipo_idtipo=tipo.idtipo';
	
	
	if(isset($_POST["filtrarProducto"])){
	$categoria="";
	if(($_POST["categoria"])&&($_POST["tipo"])!=""){
		$categoria= $_POST["categoria"];
		$tipo= $_POST["tipo"];
		$model->condition="categorias_idcategoria=$categoria AND tipo_idtipo=$tipo";
	}else if(($_POST["categoria"])!=""){
		$categoria= $_POST["categoria"];
		$model->condition="categorias_idcategoria=$categoria";
	}else if(($_POST["tipo"])!=""){
		$tipo= $_POST["tipo"];
		$model->condition="tipo_idtipo=$tipo";
	}
		
		
	
		
	}//fin del isset
	//$model->condition='idusuario=3';
	
	
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	
?>
          	<h3><i class="fa fa-angle-right"></i>Productos en el restaurante</h3>
          	 <h4>El total de productos es <?php echo $total; ?></h4>
          	<!--           	 <div class="row mt">
          		<div class="col-lg-12">
          	 <form class="form-horizontal style-form">
          		<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre del Usuario</label>
                              <div class="col-sm-4">
                                 <select class="form-control">
						  <option>1</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						</select>
                              </div>
                 </div>
          	 </form>
          	 </div></div>   
          	 -->

          	  
          	<div class="row mt">
          		<div class="col-lg-12">
          		
          		<div class="row">
						<!-- cada producto PANEL -->
						
						<?php if($total!=0){
						foreach($filas as $fila){?>
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
							
							<div class="weather-2 pn">
							
							
								<div class="weather-2-header">
									<div class="row">
										<div class="col-sm-6 col-xs-6">
											<p><?php echo utf8_encode($fila['nombre']); ?></p>
										</div>
										<div class="col-sm-6 col-xs-6 goright">
											<p class="small">
											<?php if(($fila['disponibilidad'])== 'si'){echo "Disponible";}else{echo "No Disponible";} ?>
											</p>
										</div>
									</div>
								</div><!-- /weather-2 header -->
								
								
								<div class="row centered">
									<img width="120" height="120" class="img-circle" src="assets/img/<?php echo $fila['imagen']; ?>">			
								</div>
								<div class="row data">
									<div class="col-sm-6 col-xs-6 goleft">
										<h5><p>Precio: <b>$ <?php echo $fila['precio']; ?>.00</b></p></h5>
										<h6>Categoria: <?php echo $fila['cat']; ?> </h6>
										
									</div>
									<div class="col-sm-6 col-xs-6 goright">
										<h5>
										<span style="padding:5px;">
										<a href="eliminar.php?idproducto='<?php echo $fila['idproducto']; ?>'" title="Eliminar" alt="Eliminar"><i  class="fa fa-times fa-3"></i></a></span>
										<span><a href="actualizar.php?idproducto='<?php echo $fila['idproducto']; ?>'" title="Actualizar" alt="Actualizar"><i  class="fa fa-wrench fa-3"></i></a></span>
										</h5>
										<h6><b>Tipo: <?php echo $fila['descripcion']; ?></b></h6>
										
									</div>
								</div>
								
							</div><!--weather-2 pn-->
							
						</div>    <!-- cada producto div col lg 4-->
						<?php } }else{
							echo"<b>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	WARNING: 		&nbsp;&nbsp;	ESA BUSQUEDA NO CONTIENE NINGUNA RESULTADO</b>";
							}//fin del foreach ?>
					
					
					
					
					
					</div><!--//row-->
          		
          		</div><!--//col lg-->

          	</div>	<!--//div row mt-->
