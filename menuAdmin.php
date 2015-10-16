 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></p>
              	  <h5 class="centered">Bienvenido de nuevo <?php echo $_SESSION['nivel'] ?>.</h5>
              	  	
                  <li class="mt">
                 
                      <a class="<?php if($active=="admin"){echo "active";} else {echo " ";} ?>" href="admin.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Administrador de Usuarios</span>
                      </a>
                  </li>
				 
               
                  <li class="sub-menu">
                      <a class="<?php if($active=="productos"){echo "active";} else {echo " ";}?>" href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Productos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="productos.php">Buscador de Productos</a></li>
                          <li><a  href="#.php">Agregar Nuevo (Prox)</a></li>
                          
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="<?php if($active=="mesas"){echo "active";} else {echo " ";}?>" href="Mesas.php" >
                          <i class="fa fa-th"></i>
                          <span>Mesas</span>
                      </a>
                     
                  </li>
                 <li class="sub-menu">
                      <a class="<?php if($active=="cliente"){echo "active";} else {echo " ";}?>" href="cliente.php" >
                          <i class="fa fa-desktop"></i>
                          <span>Clientes</span>
                      </a>
                                        </li>
                  
                   <!--li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Facturas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="vFactura.php">Ver Facturas</a></li>
                          <li><a  href="cFactura.php">Cancelar Facturas</a></li>
                      </ul>
                  </-->
                  <li class="sub-menu">
                      <a class="<?php if($active=="pedidos"){echo "active";} else {echo " ";}?>" href="Pedidos.php" >
                          <i class="fa fa-th"></i>
                          <span>Pedidos</span>
                      </a>
                       <ul class="sub">
                          <li><a  href="Pedidos.php">Crear un Nuevo Pedido</a></li>
                          <li><a  href="#.php">Ver Pedidos en proceso</a></li>
                          
                      </ul>
                     
                  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>