<?php

	$model = new Crud;
	$model->select = '*';
	$model->from = 'mesas';
	//$model->condition='idusuario=3';
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	
?>
          		<div class="col-lg-7" style="float:right;">
	                  	  <div class="content-panel">
	                  	  
	                  	  	  <h4><i class="fa fa-angle-right"></i> Mesas en el Restaurante</h4>
	                  	  	  <h4>El total de mesas en el restaurante es de <?php echo $total; ?></h4>
	                  	  	  <hr>
		                      <table class="table">
		                          <thead>
		                          <tr>
		                              <th>#ID</th>
		                              <th>Descripcion Mesa</th>
		                              <th>Ocupado</th>
		                              
		                              <th>Administrar</th>
		                          </tr>
		                          </thead>
		                          <tbody>
		                          <?php 
		                          foreach($filas as $fila){
		                          echo "<tr>";
		                          echo "<td>".$fila['idmesa']."</td>";
		                          echo "<td>".$fila['descripcion']."</td>";
		                          echo "<td>".$fila['ocupado']."</td>";
		                          
		                          echo "<td>";?>
		                          <h5>
										<span style="padding:5px;">
										<a href="eliminarMesa.php?idmesa='<?php echo $fila['idmesa']; ?>'" title="Eliminar" alt="Eliminar"><i  class="fa fa-times fa-3"></i></a></span>
										<span><a href="actualizarMesa.php?idmesa='<?php echo $fila['idmesa']; ?>'" title="Actualizar" alt="Actualizar"><i  class="fa fa-wrench fa-3"></i></a></span>
										</h5>
		                          
		                         <?php echo "</td>";  
		                          echo "</tr>";
		                          }
		                          ?>
		                          
		                         </tbody>
		                      </table>
	                  	  </div><! --/content-panel -->
	                  </div><!-- /col-md-12 -->
	                  
