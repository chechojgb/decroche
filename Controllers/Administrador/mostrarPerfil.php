<?php

function cargarPerfil(){
    //utilizamos la variable de sesion global para traer todos los datos del usuario.
    $id = $_SESSION['id'];

    $objConsultas = new ConsultasAdmin();

    $result = $objConsultas->perfilUser($id); 

    foreach ($result as $f) {
        echo'<li>
        <a class="sidebar-sub-toggle" ">
            <img src="'.$f['foto'].'" alt="foto de usuario"  style="width:60px; height: 60px; border-radius: 30%; border: 2px solid #fff;" > '.$f['nombres'].' '.$f['apellidos'].'
            <span class="sidebar-collapse-icon ti-angle-down"></span>
        </a>
        <ul>
            <li><a href="profile.php"><i class="ti-marker-alt"></i> Editar cuenta</a></li>
            <li><a href="../../Controllers/cerrarSesion.php"><i class="ti-eye"></i>Cerrar sesion</a></li>
        </ul>
    </li>';
    }
}
function cargarPerfilV(){
  //utilizamos la variable de sesion global para traer todos los datos del usuario.
  $id = $_SESSION['id'];

  $objConsultas = new ConsultasVendedor();

  $result = $objConsultas->perfilUser($id); 

  foreach ($result as $f) {
      echo'<li>
      <a class="sidebar-sub-toggle" ">
          <img src="'.$f['foto'].'" alt="foto de usuario"  style="width:60px; height: 60px; border-radius: 30%; border: 2px solid #fff;" > '.$f['nombres'].' '.$f['apellidos'].'
          <span class="sidebar-collapse-icon ti-angle-down"></span>
      </a>
      <ul>
          <li><a href="profile.php"><i class="ti-marker-alt"></i> Editar cuenta</a></li>
          <li><a href="../../Controllers/cerrarSesion.php"><i class="ti-eye"></i>Cerrar sesion</a></li>
      </ul>
  </li>';
  }
}
function cargarPerfil2(){
  //utilizamos la variable de sesion global para traer todos los datos del usuario.
  $id = $_SESSION['id'];

  $objConsultas = new ConsultasAdmin();

  $result = $objConsultas->perfilUser($id); 

  foreach ($result as $f) {
      $foto = substr($f['foto'], 6);
      echo'
      <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="'.$foto.'" alt="foto de usuario"  style="width:60px; height: 60px; border-radius: 30%; border: 2px solid #fff; cursor: pointer; "; ></a>
      <div class="dropdown-menu m-0 bg-secondary rounded-0">
          '.$f['nombres'].' '.$f['apellidos'].'
          <a href="Views/user/profileUser.php" class="dropdown-item" >Editar Cuenta</a>
          <a href="Controllers/cerrarSesion.php" class="dropdown-item" >Cerrar sesión</a>
      </div>
    </div>';
  }
}
function cargarPerfil3(){
  //utilizamos la variable de sesion global para traer todos los datos del usuario.
  $id = $_SESSION['id'];

  $objConsultas = new ConsultasAdmin();

  $result = $objConsultas->perfilUser($id); 

  foreach ($result as $f) {
      $foto = substr($f['foto'], 0);
      echo'
  
  
  
      <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="'.$foto.'" alt="foto de usuario"  style="width:60px; height: 60px; border-radius: 30%; border: 2px solid #fff; cursor: pointer; "; ></a>
      <div class="dropdown-menu m-0 bg-secondary rounded-0">
          '.$f['nombres'].' '.$f['apellidos'].'
          <a href="../../Views/user/profileUser.php" class="dropdown-item"  >Editar Cuenta</a>
          <a href="../../Controllers/cerrarSesion.php" class="dropdown-item" >Cerrar sesión</a>
      </div>
    </div>';
  }
}
function cargarPerfil4(){
  //utilizamos la variable de sesion global para traer todos los datos del usuario.
  $id = $_SESSION['id'];

  $objConsultas = new ConsultasAdmin();

  $result = $objConsultas->perfilUser($id); 

  foreach ($result as $f) {
      $foto = substr($f['foto'], 0);
      echo'
  
  
  
      <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="../../'.$foto.'" alt="foto de usuario"  style="width:60px; height: 60px; border-radius: 30%; border: 2px solid #fff; cursor: pointer; "; ></a>
      <div class="dropdown-menu m-0 bg-secondary rounded-0">
          '.$f['nombres'].' '.$f['apellidos'].'
          <a href="../../../../Views/user/profileUser.php" class="dropdown-item" style="color: black!important" >Editar Cuenta</a>
          <a href="../../../../Controllers/cerrarSesion.php" class="dropdown-item" style="color: black!important">Cerrar sesión</a>
      </div>
    </div>';
  }
}

function cargarPerfilPrincipal(){
    $id = $_SESSION['id'];

    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->perfilUser($id);

    foreach ($result as $f) {
        echo '
        
        <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="user-photo m-b-30" >
                        <img src="'.$f['foto'].'" alt="foto de usuario"  style="max-width:300px; max-height: 500px; border-radius: 10px; border: 2px solid #fff";>
                        </div>
                        <div class="user-work">
                          <h2>'.$f['nombres'].' '.$f['apellidos'].'</h2>
                          <div class="work-content">
                            <h3>Rol: '.$f['rol'].' </h3>
                            <br>
                            <h3>Correo: '.$f['email'].'</h3>
                            <br>
                            <h3>Telefono: '.$f['telefono'].'</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-8">

                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                              type="button" role="tab" aria-controls="nav-home" aria-selected="true">Perfil</button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile"
                              type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar
                              clave</button>
                            <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact"
                              type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cambiar
                              foto</button>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="card">
                              <h3>Modificar datos de la cuenta</h3>
                              <form action="../../Controllers/Administrador/editarPerfilUser.php" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                  <div class="form-group col-md-6"">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control" placeholder="Ej:Jonh" name="id" value="'.$f['id'].'" style="display: none;">
                                    <input type="text" class="form-control" placeholder="Ej:Jonh" name="nombres" value="'.$f['nombres'].'">
                                  </div>
                                  <div class="form-group col-md-6"">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" placeholder="Ej:Giglioli"
                                    name="apellidos" value="'.$f['apellidos'].'">
                                  </div>
                                  <div class="form-group col-md-6"">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Ej:carolahindiaz@gmail.com
                                    " value="'.$f['email'].'">
                                  </div>
                                  <div class="form-group col-md-6"">
                                    <label>Telefono</label>
                                    <input type="number" class="form-control" name="telefono"
                                    placeholder="Ej:3209925728" value="'.$f['telefono'].'">
                                  </div>
                                  <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                    >Actualizar
                                    datos</button>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            <div class="card">
                              <h3>Modificar datos de la cuenta</h3>
                              <form action="../../Controllers/Administrador/cambiarClaveUser.php" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                  <div class="form-group col-md-6"">
                                    <label>Clave antigua</label>
                                    <input type="text" class="form-control" placeholder="Ej:Jonh" name="id" value="'.$f['id'].'" style="display: none;">
                                    <input type="password" class="form-control" name="old-clave" placeholder="Ej:****"
                                    id="clave-old">
                                  </div>
                                  <div class="form-group col-md-6"">
                                    <label>Nuevo clave</label>
                                    <input type="password" class="form-control" name="new-clave" placeholder="Ej:****"
                                    id="clave">
                                  </div>
                                  <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                  >Cambiar clave</button>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="card">
                              <h3>Modificar Foto</h3>
                              <form action="../../Controllers/Administrador/modificarFotoPerfilUser.php" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                  <div class="form-group col-md-8"">
                                    <label>foto</label>
                                    <input type="text" class="form-control" placeholder="Ej:Jonh" name="id" value="'.$f['id'].'" style="display: none;">
                                    <input type="file" class="form-control" name="foto" id="foto" accept=".png,.jpg">
                                  </div>
                                  <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                >Cambiar foto</button>
                                </div>
                              </form>
                            </div>

                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
        ';
    }
}

function cargarPerfilPrincipalAdmin(){
  $id = $_SESSION['id'];

  $objConsultas = new ConsultasAdmin();
  $result = $objConsultas->perfilUser($id);

  foreach ($result as $f) {
      echo '
      
      <div class="user-profile">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="user-photo m-b-30" >
                      <img src="'.$f['foto'].'" alt="foto de usuario"  style="max-width:300px; max-height: 500px; border-radius: 10px; border: 2px solid #fff";>
                      </div>
                      <div class="user-work">
                        <h2>'.$f['nombres'].' '.$f['apellidos'].'</h2>
                        <div class="work-content">
                          <h3>Rol: '.$f['rol'].' </h3>
                          <br>
                          <h3>Correo: '.$f['email'].'</h3>
                          <br>
                          <h3>Telefono: '.$f['telefono'].'</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">

                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Perfil</button>
                          <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar
                            clave</button>
                          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cambiar
                            foto</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                          aria-labelledby="nav-home-tab">
                          <div class="card">
                            <h3>Modificar datos de la cuenta</h3>
                            <form action="../../Controllers/Administrador/editarPerfil.php" method="post"
                              enctype="multipart/form-data">
                              <div class="row">
                                <div class="form-group col-md-6"">
                                  <label>Nombres</label>
                                  <input type="text" class="form-control" placeholder="Ej:Jonh" name="id" value="'.$f['id'].'" style="display: none;">
                                  <input type="text" class="form-control" placeholder="Ej:Jonh" name="nombres" value="'.$f['nombres'].'">
                                </div>
                                <div class="form-group col-md-6"">
                                  <label>Apellidos</label>
                                  <input type="text" class="form-control" placeholder="Ej:Giglioli"
                                  name="apellidos" value="'.$f['apellidos'].'">
                                </div>
                                <div class="form-group col-md-6"">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="email" placeholder="Ej:carolahindiaz@gmail.com
                                  " value="'.$f['email'].'">
                                </div>
                                <div class="form-group col-md-6"">
                                  <label>Telefono</label>
                                  <input type="number" class="form-control" name="telefono"
                                  placeholder="Ej:3209925728" value="'.$f['telefono'].'">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                  style="background: #c96691; color: #000; margin-left: 38%;">Actualizar
                                  datos</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                          <div class="card">
                            <h3>Modificar datos de la cuenta</h3>
                            <form action="../../Controllers/Administrador/cambiarClave.php" method="post"
                              enctype="multipart/form-data">
                              <div class="row">
                                <div class="form-group col-md-6"">
                                  <label>Clave antigua</label>
                                  <input type="text" class="form-control" placeholder="Ej:Jonh" name="id" value="'.$f['id'].'" style="display: none;">
                                  <input type="password" class="form-control" name="old-clave" placeholder="Ej:****"
                                  id="clave-old">
                                </div>
                                <div class="form-group col-md-6"">
                                  <label>Nueva clave</label>
                                  <input type="password" class="form-control" name="new-clave" placeholder="Ej:****"
                                  id="clave">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                  style="background: #c96691; color: #000; margin-left: 38%;">Cambiar clave</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <div class="card">
                            <h3>Modificar Foto</h3>
                            <form action="../../Controllers/Administrador/modificarFotoPerfil.php" method="post"
                              enctype="multipart/form-data">
                              <div class="row">
                                <div class="form-group col-md-8"">
                                  <label>foto</label>
                                  <input type="text" class="form-control" placeholder="Ej:Jonh" name="id" value="'.$f['id'].'" style="display: none;">
                                  <input type="file" class="form-control" name="foto" id="foto" accept=".png,.jpg">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                  style="background: #c96691; color: #000; margin-left: 38%;">Cambiar foto</button>
                              </div>
                            </form>
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
      ';
  }
}



function cargarPerfilPrincipalVendedor(){
  $id = $_SESSION['id'];

  $objConsultas = new ConsultasVendedor();
  $result = $objConsultas->perfilUser($id);

  foreach ($result as $f) {
      echo '
      
      <div class="user-profile">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="user-photo m-b-30" >
                      <img src="'.$f['foto'].'" alt="foto de usuario"  style="max-width:300px; max-height: 500px; border-radius: 10px; border: 2px solid #fff";>
                      </div>
                      <div class="user-work">
                        <h2>'.$f['nombres'].' '.$f['apellidos'].'</h2>
                        <div class="work-content">
                          <h3>Rol: '.$f['rol'].' </h3>
                          <br>
                          <h3>Correo: '.$f['email'].'</h3>
                          <br>
                          <h3>Telefono: '.$f['telefono'].'</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">

                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Perfil</button>
                          <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar
                            clave</button>
                          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cambiar
                            foto</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                          aria-labelledby="nav-home-tab">
                          <div class="card">
                            <h3>Modificar datos de la cuenta</h3>
                            <form action="../../Controllers/Vendedor/editarPerfil.php" method="post"
                              enctype="multipart/form-data">
                              <div class="row">
                                <div class="form-group col-md-6"">
                                  <label>Nombres</label>
                                  <input type="text" class="form-control" placeholder="Ej:Jonh" name="id" value="'.$f['id'].'" style="display: none;">
                                  <input type="text" class="form-control" placeholder="Ej:Jonh" name="nombres" value="'.$f['nombres'].'">
                                </div>
                                <div class="form-group col-md-6"">
                                  <label>Apellidos</label>
                                  <input type="text" class="form-control" placeholder="Ej:Giglioli"
                                  name="apellidos" value="'.$f['apellidos'].'">
                                </div>
                                <div class="form-group col-md-6"">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="email" placeholder="Ej:carolahindiaz@gmail.com
                                  " value="'.$f['email'].'">
                                </div>
                                <div class="form-group col-md-6"">
                                  <label>Telefono</label>
                                  <input type="number" class="form-control" name="telefono"
                                  placeholder="Ej:3209925728" value="'.$f['telefono'].'">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                  style="background: #c96691; color: #000; margin-left: 38%;">Actualizar
                                  datos</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                          <div class="card">
                            <h3>Modificar datos de la cuenta</h3>
                            <form action="../../Controllers/Vendedor/cambiarClave.php" method="post"
                              enctype="multipart/form-data">
                              <div class="row">
                                <div class="form-group col-md-6"">
                                  <label>Clave antigua</label>
                                  <input type="text" class="form-control" placeholder="Ej:Jonh" name="id" value="'.$f['id'].'" style="display: none;">
                                  <input type="password" class="form-control" name="old-clave" placeholder="Ej:****"
                                  id="clave-old">
                                </div>
                                <div class="form-group col-md-6"">
                                  <label>Nueva clave</label>
                                  <input type="password" class="form-control" name="new-clave" placeholder="Ej:****"
                                  id="clave">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                  style="background: #c96691; color: #000; margin-left: 38%;">Cambiar clave</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <div class="card">
                            <h3>Modificar Foto</h3>
                            <form action="../../Controllers/Vendedor/modificarFotoPerfil.php" method="post"
                              enctype="multipart/form-data">
                              <div class="row">
                                <div class="form-group col-md-8"">
                                  <label>foto</label>
                                  <input type="text" class="form-control" placeholder="Ej:Jonh" name="id" value="'.$f['id'].'" style="display: none;">
                                  <input type="file" class="form-control" name="foto" id="foto" accept=".png,.jpg">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                  style="background: #c96691; color: #000; margin-left: 38%;">Cambiar foto</button>
                              </div>
                            </form>
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
      ';
  }
}
?>
