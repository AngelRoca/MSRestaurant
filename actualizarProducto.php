<?php

$mensaje=null;
	if(isset($_POST["updateProducto"])){
	
		
		$id_producto=$_POST["id_producto"];
		
		$n_ombre = htmlspecialchars($_POST["nombre"]);
			
		$precio = explode(" ",$_POST["precio"]);
		$precio = $precio[1]; // sin el $

		$p_recio = htmlspecialchars($precio);
		
		$d_isponibilidad=$_POST["disponibilidad"];
		$c_ategoria=$_POST["categoria"];
		$d_escripcion=$_POST["tipo"];
	//	echo"<h1>$id_producto</h1>";	
		
		//actualizando registro
	    $model = new Crud;
		$model->update = "productos";
		//echo "update productos set nombre='$n_ombre', precio='$p_recio', disponibilidad='$d_isponibilidad', categorias_idcategoria=$c_ategoria, tipo_idtipo=$d_escripcion WHERE 'idproducto'=$id_producto";
		$model->set="nombre='$n_ombre', precio=$p_recio, disponibilidad='$d_isponibilidad', categorias_idcategoria=$c_ategoria, tipo_idtipo=$d_escripcion";
		$model->condition = "idproducto=$id_producto";
		$model->Update();
		$mensaje=$model->mensaje;
		
	}

if(isset($_REQUEST["idproducto"])){
	
		$idproducto = htmlspecialchars($_REQUEST["idproducto"]);
		
		$model = new Crud;
		$model->select = 'productos.idproducto,productos.nombre as nombre,productos.precio as precio,productos.disponibilidad as disponibilidad,productos.imagen as img ,categorias.idcategoria as id_categoria,categorias.nombre as cat,tipo.idtipo as id_tipo,tipo.descripcion as descripcion';
		$model->from = 'productos INNER JOIN categorias ON productos.categorias_idcategoria=categorias.idcategoria INNER JOIN tipo ON productos.tipo_idtipo=tipo.idtipo';
		
		$model->condition = " productos.idproducto = $idproducto";
		$model->Read();
		//echo"<h1>$idproducto</h1>";
		$filas=$model->rows;
		
		foreach($filas as $fila){
		
			$nombre=$fila["nombre"];
			$precio=$fila["precio"];
			$idcategoria = $fila["id_categoria"];
			$idtipo=$fila["id_tipo"];
			$disponibilidad=$fila["disponibilidad"];
			$imagen=$fila["img"];
			$categoria=$fila["cat"];
			$descripcion=$fila["descripcion"];
			
		}	
	}//fin del if
	
	
		
	

?>

          		<div class="col-lg-12" >
          		
          		
          		<h3>Actualizar Producto</h3>
          		
          		<?php echo $mensaje; ?> <br> 
          		<a href="productos.php">Regresar a los productos</a>
  <form class="form-horizontal style-form" name="formUpdateProducto" id="formUpdateProducto" action="<?php echo $_SERVER["PHP_SELF"]; ?>?idproducto=<?php echo $idproducto; ?>" method="post">
          		<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre del producto:</label>
                              <div class="col-sm-4">
                                  <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" class="form-control">
                              </div>
                              
                              <label class="col-sm-2 col-sm-2 control-label">Imagen del producto:</label>
                              <div class="col-sm-4">
                                  <img src="assets/img/<?php echo $imagen; ?>"/>
                              </div>
                 </div><!--fin del form group-->
                 
                  
                 
                 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Precio del producto</label>
                              <div class="col-sm-3">
                                  <input type="text" name="precio" id="precio" value="$ <?php echo $precio; ?>" class="form-control">
                              </div>
                 </div><!--fin del form group-->
                 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Disponibilidad:</label>
                              <div class="col-sm-4">
                                 <select class="form-control" name="disponibilidad">
									  <option <?php if($disponibilidad=="si"){echo "selected";} ?> value="si">Disponible</option>
									  <option <?php if($disponibilidad=="no"){echo "selected";} ?> value="no">No disponible</option>
								</select>
                                  
                              </div>
                 </div><!--fin del form group-->
                 <?php 
	                 $model = new Crud;
					 $model->select = '*';
					 $model->from = 'categorias';
					 $model->Read();
					 $filas = $model->rows;
                 ?>
                 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Categoria:</label>
                              <div class="col-sm-4">
                                 <select class="form-control" name="categoria">
						  <?php foreach($filas as $fila){ ?>
						  <option id="<?php echo $fila["idcategoria"];?>" value="<?php echo $fila["idcategoria"];?>" <?php if($idcategoria==($fila["idcategoria"])){echo "selected";} ?> ><?php echo $fila["nombre"]; ?>
						  </option>
						  <?php } ?>
						  		</select>
                              </div>
                 </div><!--fin del form group-->
                 <?php 
	                 $model = new Crud;
					 $model->select = '*';
					 $model->from = 'tipo';
					 $model->Read();
					 $filas = $model->rows;
                 ?>
                 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Descripción:</label>
                              <div class="col-sm-4">
                                   <select class="form-control" name="tipo">
						  <?php foreach($filas as $fila){ ?>
						  <option value="<?php echo $fila["idtipo"]; ?>" <?php if($idtipo==($fila["idtipo"])){echo "selected";} ?> ><?php echo $fila["descripcion"]; ?></option>
						  <?php } ?>
						  		</select>
                              </div>
                 </div><!--fin del form group-->
                 
                 
                                 
                 
                <input type="hidden" name="updateProducto">
                 <input type="hidden" name="id_producto" value="<?php echo $idproducto; ?>">
                 
                <button class="btn btn-theme02" type="submit"><i class="fa fa-check"></i> Actualizar Producto</button>
          		</form><!--FIN DEL FORM-->
          		
          		</div><!--fin del col lg 6-->

