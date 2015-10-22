<?php
	$model = new Crud;
	$model->select = '*';
	$model->from = 'usuarios';
	//$model->condition='idusuario=3';
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	
?>
          		<div class="col-lg-8" style="float:right;">
	                  	  <div class="content-panel">
	                  	  
	                  	  	  <h4><i class="fa fa-angle-right"></i> Usuarios en el Sistema</h4>
	                  	  	  <h4>El total de usuarios es <?php echo $total; ?></h4>
	                  	  	  <hr>
		                      <table class="table">
		                          <thead>
		                          <tr>
		                              <th>#ID</th>
		                              <th>Nombre del Usuario</th>
		                              <th>Contraseña</th>
		                              <th>Nivel del Usuario</th>
		                              <th>Administrar</th>
		                          </tr>
		                          </thead>
		                          <tbody>
		                          <?php 
		                          foreach($filas as $fila){
		                          echo "<tr>";
		                          echo "<td>".$fila['idusuario']."</td>";
		                          echo "<td>".$fila['nombre']."</td>";
		                          echo "<td>".$fila['pass']."</td>";
		                          echo "<td>".$fila['nivel']."</td>";  
		                          echo "<td>";?>
		                          <h5>
										<span style="padding:5px;">
										<a href="eliminarUsuario.php?idusuario='<?php echo $fila['idusuario']; ?>'" title="Eliminar" alt="Eliminar"><i  class="fa fa-times fa-3"></i></a></span>
										<span><a href="actualizarUsuario.php?idusuario='<?php echo $fila['idusuario']; ?>'" title="Actualizar" alt="Actualizar"><i  class="fa fa-wrench fa-3"></i></a></span>
										</h5>
		                          
		                         <?php echo "</td>";  
		                          echo "</tr>";
		                          }
		                          ?>
		                          
		                         </tbody>
		                      </table>
	                  	  </div><! --/content-panel -->
	                  </div><!-- /col-md-12 -->
	                  
