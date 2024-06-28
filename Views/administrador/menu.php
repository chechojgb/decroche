
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano"">
        <div class="nano-content" >
            <ul>
                    <div class="logo" ><a href="./administrador.php" class="navbar-brand"><img src="../client-side/images/decrochea.png" class="img-fluid rounded" alt=""></a></div>
                    
                    <?php
                    cargarPerfil();
                    ?>
                    <li class="label" style="    margin-left: 20px;
    font-size: 18px;">Menú principal</li>
                    
                    <li><a href="administrador.php"><i class="ti-calendar"></i > Inicio </a></li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Usuarios <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="registrarUser.php"><i class="ti-marker-alt"></i> Registrar</a></li>
                            <li><a href="verUsers.php"><i class="ti-eye"></i> Ver</a></li>
                            <li><a href="exportar.php"><i class="ti-download"></i>Descargar info</a></li>
                        </ul>
                    </li>
                    
                    <li><a class="sidebar-sub-toggle"><i class="ti-archive"></i> Inventario<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                    <li><a href="registrarProduct.php"><i class="ti-clipboard"></i> Registrar productos</a></li>
                            <li><a href="verProduct.php"><i class="ti-menu-alt"></i> Ver productos</a></li>
                            <li><a href="exportarProductos.php"><i class="ti-agenda"></i> Descargar info</a></li>
                    </ul>
                    <li><a class="sidebar-sub-toggle"><i class="ti-face-sad"></i> Radicados Pqr<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                    <li><a href="verRadicado.php"><i class="ti-clipboard"></i> Ver pqr</a></li>
                            <li><a href="./exportarRadicados.php"><i class="ti-menu-alt"></i> Descargar pqr</a></li>
                            
                    </ul>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart"></i> Ventas<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                    <li><a href="./exportarCompras.php"><i class="ti-clipboard"></i> Ver Compras</a></li>

                    </ul>
                    
                </ul>
            </div>
        </div>
</div>