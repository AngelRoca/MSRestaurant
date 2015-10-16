<?php

	$model = new Crud;
	$model->select = '*';
	$model->from = 'cliente';
	//$model->condition='idusuario=3';
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	
?>
          		<div class="col-lg-8" style="float:right;">
	                  	  <div class="content-panel">
	                  	  
	                  	  	  <h4><i class="fa fa-angle-right"></i> Clientes registrados en el Restaurante</h4>
	                  	  	  <h4><i class="fa fa-angle-right"></i>El total de clientes en el restaurante es de <?php echo $total; ?></h4>
	                  	  	  <hr>
		                      <table class="table">
		                          <thead>
		                          <tr>
		                              <th>#IDCLIENTE</th>
		                              <th>RFC</th>
		                              <th>Nombre</th>
		                              <th>Direccion</th>
		                              <th>Administrar</th>
		                          </tr>
		                          </thead>
		                          <tbody>
		                          <?php 
		                          foreach($filas as $fila){
		                          echo "<tr>";
		                          echo "<td>".$fila['idcliente']."</td>";
		                          echo "<td>".$fila['RFC']."</td>";
		                          echo "<td>". utf8_encode($fila['nombre'])." ".utf8_encode($fila['pApellido'])." ".utf8_encode($fila['sApellido'])."</td>";
		                          echo "<td>".$fila['direccion']."</td>";
		                          
		                          echo "<td>";?>
		                          <h5>
										<span style="padding:5px;">
										<a href="eliminarCliente.php?idcliente='<?php echo $fila['idcliente']; ?>'" title="Eliminar" alt="Eliminar"><i  class="fa fa-times fa-3"></i></a></span>
										<span><a href="actualizarCliente.php?idcliente='<?php echo $fila['idcliente']; ?>'" title="Actualizar" alt="Actualizar"><i  class="fa fa-wrench fa-3"></i></a></span>
										</h5>
		                          
		                         <?php echo "</td>";  
		                          echo "</tr>";
		                          
		                          }
		                          ?>
		                          
		                         </tbody>
		                      </table>
	                  	  </div><! --/content-panel -->
	                  </div><!-- /col-md-12 -->
	                  