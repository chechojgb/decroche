
<?php
  require_once("./Models/carrito.php");
  require_once("./Models/conexion_db.php");
  require_once("./Models/consultasGlobal.php");
  require_once("./Controllers/cargarProducto.php");
  require_once("./Controllers/Administrador/mostrarPerfil.php");
  require_once("./Models/consultasAdmin.php");
  
?>
<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top" style="box-shadow: 0px 5px 5px rgb(224, 142, 177);">
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl" style="box-sizing: content-box !important;" >
                    <a href="./index.php" class="navbar-brand"><div class="rounded me-4" style="width: 200px; height: 60px;"><img src="./Views/client-side/images/decrocher.png" class="img-fluid rounded" alt=""></div></a>
                    
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <?php
                            // Verifica si la sesión está iniciada
                              if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                                echo '<a style="display:none;" href="./page-login.php" class="nav-item nav-link">Ingresa</a>';
                              } else {
                                echo '<a href="./Views/extras/page-login.php" class="nav-item nav-link">Ingresa</a>';
                                  // Si la sesión no está iniciada, muestra el ícono de inicio de sesión
                              }
                            ?>
                            
                            <div class="nav-item dropdown">
                                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tienda</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="./Views/extras/categoria.php" class="dropdown-item">Todos los productos</a>
                                    <a href="./Views/extras/categoria/ropa/ropa.php" class="dropdown-item">Ropa</a>
                                    <a href="./Views/extras/categoria/lanas/lana.php" class="dropdown-item">Lana</a>
                                    <a href="./Views/extras/categoria/costura/costura.php" class="dropdown-item">Articulos de costura</a>
                                    <a href="./Views/extras/categoria/patrones/patrones.php" class="dropdown-item">Patrones</a>
                                </div>
                            </div>
                            <a href="./Views/extras/mostrarCarrito.php" class="nav-item nav-link">Compra</a>
                            <a href="./Views/servicios/servicios.php" class="nav-item nav-link">Nuestros servicios</a>
                            <div class="nav-item dropdown">
                                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tus productos</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="./Views/user/facturas.php" class="dropdown-item">Facturas</a>
                                    <a href="./Views/user/calificacion.php" class="dropdown-item">Productos comprados</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <?php
                            // Verifica si la sesión está iniciada
                              if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                                echo '<button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal" style="margin-top: 13px!important;" ><i class="fas fa-search color-pink"></i></button>';
                              } else {
                                echo '<button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal" style="margin-top: 0px!important;" ><i class="fas fa-search color-pink"></i></button>';
                                  // Si la sesión no está iniciada, muestra el ícono de inicio de sesión
                              }
                            ?>
                            
                            <a href="./Views/extras/mostrarCarrito.php" class="position-relative me-4 my-auto">
                              <i class="fa fa-cart-plus fa-2x" style="color:#e08eb1;" ></i>
                              <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center  px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px; background-color: #e08eb1!important; color: #fff !important;">
                                <?php 
                                echo(empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                                ?>
                              </span>
                            </a>
                                <?php
                                // Verifica si la sesión está iniciada
                                  if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                                      // Si la sesión está iniciada, muestra el ícono de usuario
                                  cargarPerfil2();
                                  } else {
                                      // Si la sesión no está iniciada, muestra el ícono de inicio de sesión
                                      echo '<a href="./Views/extras/page-login.php" class="my-auto"><i class="fas fa-user fa-2x"></i></a>';
                                  }
                                ?>

                        </div>
                    </div>
                </nav>
            </div>
</div>




  
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Busca tu producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body  align-items-center">
                      <div class="input-group w-75 mx-auto d-flex" id="buscar_producto">
                        <input type="search" class="form-control p-3" placeholder="Busca tu producto" aria-describedby="search-icon-1" id="buscarProducto_a" >
                                    <button onclick="buscar_ahora_a()" class="boton_busqueda"><span id="search-icon-1" class="input-group-text p-3 busqueda_icono" ><i class="fa fa-search"></i></span></button>
    
                        </div>
                        <div class="col-lg-4" style="margin: auto; width: 350px" >
                            <div class="card buscador" id="caja_buscador_a"  >
                                    <div class="card-title">
                                        <h4>Productos relacionados</h4>

                                    </div>
                                    <div class="card-body">
                                        <ul class="timeline" id="datos_buscador_a">
                                        </ul>
                                    </div>
                            </div>
                            <!-- /# card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>