<?php

class Consultas{
    public function registrarUserExterno($nombres,$apellidos,$email,$claveMD,$estado,$telefono,$fecha_creacion){

         //Creamos el objeto de la clase conexion
         $objConexion = new Conexion();
         $conexion = $objConexion->get_conexion();
         //consultamos toda la informacion del usuario
         // a partir de su email
 
         $consultar= "SELECT * FROM users WHERE email=:email";
         $result = $conexion->prepare($consultar);
         $result->bindParam(':email',$email);
 
         $result->execute();
         //validamos si existe usuario con este email
 
         if ($f = $result->fetch()) {
            echo 'fallo';
             
         }
         else {
            echo 'exito';
            $insertar = "INSERT INTO users(nombres,apellidos,email,clave,estado,telefono,fecha_creacion) VALUES(:nombres,:apellidos,:email,:claveMD,:estado,:telefono,:fecha_creacion)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(':nombres',$nombres);
            $result->bindParam(':apellidos',$apellidos);
            $result->bindParam(':email',$email);
            $result->bindParam(':claveMD',$claveMD);
            $result->bindParam(':estado',$estado);
            $result->bindParam(':telefono',$telefono);
            $result->bindParam(':fecha_creacion',$fecha_creacion);

            $result->execute();
        }

    }

    
    public function registrarVendedor($nombres,$apellidos,$email,$claveMD,$estado,$telefono,$fecha_creacion,$documento, $rol){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        //consultamos toda la informacion del usuario
        // a partir de su email

        $consultar= "SELECT * FROM users WHERE email=:email";
        $result = $conexion->prepare($consultar);
        $result->bindParam(':email',$email);

        $result->execute();
        //validamos si existe usuario con este email

        if ($f = $result->fetch()) {
           echo 'fallo';
            
        }
        else {
           echo 'exito';
           $insertar = "INSERT INTO users(documento,nombres,apellidos,email,clave,rol,estado,telefono,fecha_creacion) VALUES(:documento,:nombres,:apellidos,:email,:claveMD,:rol,:estado,:telefono,:fecha_creacion)";

           $result = $conexion->prepare($insertar);
        
           $result->bindParam(':documento',$documento);
           $result->bindParam(':nombres',$nombres);
           $result->bindParam(':apellidos',$apellidos);
           $result->bindParam(':email',$email);
           $result->bindParam(':claveMD',$claveMD);
           $result->bindParam(':rol',$rol);
           $result->bindParam(':estado',$estado);
           $result->bindParam(':telefono',$telefono);
           $result->bindParam(':fecha_creacion',$fecha_creacion);

           $result->execute();
       }

    }

    public function validarSesion($email,$clave){

        //Creamos el objeto de la clase conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        //consultamos toda la informacion del usuario
        // a partir de su email

        $consultar= "SELECT * FROM users WHERE email=:email";
        $result = $conexion->prepare($consultar);
        $result->bindParam(':email',$email);

        $result->execute();
        //validamos si existe usuario con este email

        if ($f = $result->fetch()) {
            //validamos la clave
            if($clave == $f['clave']){
                //Validamos el estado de la cuenta
                if ($f['estado'] == "Activo") {
                    //SE INICIA LA SESSION
                        session_start();
                        //creamos variables de sesion global para usar mas adelante
                        
                        $_SESSION['id'] = $f['id'];
                        $_SESSION['rol'] = $f['rol'];
                        $_SESSION['email'] = $f['email'];
                        $_SESSION['nombres'] = $f['nombres'];
                        $_SESSION['apellidos'] = $f['apellidos'];
                        $_SESSION['telefono'] = $f['telefono'];
                        $_SESSION['documento'] = $f['documento'];

                        $_SESSION['autenticado'] = "SI";
                        //SEGURIDAD PARA QUE NO PUEDAN ACCEDER POR URL

                        //Validamos el rol para redireccionamiento
                        switch ($f['rol']) {
                            case 'Cliente':
                                echo 'cliente'; 
                                break;
                            case 'Vendedor':
                                echo 'Vendedor'; 
                                break;
                            case 'Administrador':
                                echo 'administrador'; 
                                break;
                        }
                }
                else {
                    echo 'bloqueado';
                }
            }
            else {
                echo 'contraseña';
            }
        }
        else {
            echo 'fallo';
        }

    }
    


    public function cerrrarSesion() {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        session_start();
        session_destroy();

        echo '<script>location.href="../index.php"</script>';
    }



    public function consultarProducto(){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT * FROM products ORDER BY RAND();";
        $result = $conexion ->prepare($consultar);

        $result->execute();

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }

    public function consultarCategoriaRopa(){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT *, SUBSTRING(descripcion, 1, 60) AS descripcion FROM products WHERE categoria ='ropa' ORDER BY nombre";
        $result = $conexion ->prepare($consultar);

        $result->execute();

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;

    }
    public function consultarCategoriaLana(){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT *, SUBSTRING(descripcion, 1, 50) AS descripcion FROM products WHERE categoria ='lanas' ORDER BY nombre";
        $result = $conexion ->prepare($consultar);

        $result->execute();

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }
    public function consultarCategoriaCostura(){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT *, SUBSTRING(descripcion, 1, 50) AS descripcion FROM products WHERE categoria ='articulos' ORDER BY nombre";
        $result = $conexion ->prepare($consultar);

        $result->execute();

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }
    public function consultarCategoriaPatrones(){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT *, SUBSTRING(descripcion, 1, 50) AS descripcion FROM products WHERE categoria ='patrones' ORDER BY nombre";
        $result = $conexion ->prepare($consultar);

        $result->execute();

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }

    public function procesarCompra($total,$clave_transaccion, $correo){
        $id_user = $_SESSION['id'];

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $insertar = "INSERT INTO pedidos(`id_user`,`clave_transaccion`, `fecha`, `correo`, `total`, `estado`) VALUES (:id_user ,:clave_transaccion, NOW(), :correo, :total, 'pendiente')";
        
        $result = $conexion->prepare($insertar);

        $result->bindparam(":id_user", $id_user);
        $result->bindParam(":clave_transaccion", $clave_transaccion);
        $result->bindParam(":correo", $correo);
        $result->bindParam(":total", $total);
        $result->execute();

        $id_pedido = $conexion->lastInsertId();


        if(!empty($_SESSION['carrito'])) { 
            $cantidad = 1; 
            foreach ($_SESSION['carrito'] as $producto) {
                $id_pro = $producto['id_pro'];
                $precio_unitario = $producto['precio'];
                $subtotal = $producto['precio']*$cantidad;

                $insertar2 = "INSERT INTO detalles_pedido(`id_pedido`, `id_pro`, `cantidad`, `precio_unitario`, `subtotal`) VALUES (:id_pedido, :id_pro, :cantidad, :precio_unitario, :subtotal) ";
        
                $result2 = $conexion->prepare($insertar2);
        
                $result2->bindparam(":id_pedido", $id_pedido);
                $result2->bindparam(":id_pro", $id_pro);
                $result2->bindparam(":cantidad", $cantidad);
                $result2->bindparam(":precio_unitario", $precio_unitario);
                $result2->bindparam(":subtotal", $subtotal);
                $result2->execute();

                $_SESSION['pagoCompleto'] = False;
                $_SESSION['pagoIniciado'] = True;
            }

        }

    }

    

    
    public function facturaIndividual($id_factura){
    
        $f = [];
    
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        $consultar = "SELECT f.id_factura, f.nombre ,f.numero_factura, f.fecha_emision, f.total, p.nombre AS nombre_producto, d.cantidad, d.subtotal, tp.direccion_facturacion, tp.correo, tp.numero_cel, tp.ciudad
        FROM factura f 
        INNER JOIN detalle_factura d ON f.id_factura = d.id_factura
        INNER JOIN products p ON d.id_producto = p.id_pro 
        INNER JOIN detalles_envio tp ON f.id_factura = tp.id_factura WHERE f.id_factura = :id_factura;";
    
        $result = $conexion->prepare($consultar);
    
        $result->bindParam(':id_factura',$id_factura);
    
        $result->execute();
    
    
        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    
    }

    public function generarDetalle($id_producto){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT * FROM products WHERE id_pro = :id_producto";
        $result = $conexion ->prepare($consultar);

        $result->bindParam(':id_producto',$id_producto);
        $result->execute();


        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }



    public function registrarPeticion($nombre, $email, $motivo, $detalle, $foto, $estado, $fecha){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $num_servicio = uniqid();
        $servicio = "Petición";

        $insertar = "INSERT INTO pqr_servicios(num_servicio, nombre, email, motivo, detalle, foto, estado, fecha, tipo_servicio) VALUES(:num_servicio,:nombre,:email,:motivo,:detalle,:foto,:estado,:fecha, :tipo_servicio)";
        
        $result = $conexion->prepare($insertar);
        
        $result->bindParam(':num_servicio',$num_servicio);
        $result->bindParam(':nombre',$nombre);
        $result->bindParam(':email',$email);
        $result->bindParam(':motivo',$motivo);
        $result->bindParam(':detalle',$detalle);
        $result->bindParam(':foto',$foto);
        $result->bindParam(':estado',$estado);
        $result->bindParam(':fecha',$fecha);
        $result->bindParam(':tipo_servicio',$servicio);
        
        $result->execute();

        session_start();
        
        $_SESSION['radicado'] = "SI";
        $_SESSION['nombre_radicado'] = $nombre;
        $_SESSION['num_servicio_radicado'] = $num_servicio;
        $_SESSION['fecha_radicado'] = $fecha;
        $_SESSION['tipo_radicado'] = $servicio;
        $_SESSION['email_radicado'] = $email;
        echo '<script> location.href="../../Views/servicios/radicado.php" </script>';
       

    }
    public function registrarQueja($nombre, $email, $motivo, $detalle, $foto, $estado, $fecha){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $num_servicio = uniqid();
        $servicio = "Queja";

        $insertar = "INSERT INTO pqr_servicios(num_servicio, nombre, email, motivo, detalle, foto, estado, fecha, tipo_servicio) VALUES(:num_servicio,:nombre,:email,:motivo,:detalle,:foto,:estado,:fecha, :tipo_servicio)";
        
        $result = $conexion->prepare($insertar);
        
        $result->bindParam(':num_servicio',$num_servicio);
        $result->bindParam(':nombre',$nombre);
        $result->bindParam(':email',$email);
        $result->bindParam(':motivo',$motivo);
        $result->bindParam(':detalle',$detalle);
        $result->bindParam(':foto',$foto);
        $result->bindParam(':estado',$estado);
        $result->bindParam(':fecha',$fecha);
        $result->bindParam(':tipo_servicio',$servicio);
        
        $result->execute();

        session_start();
        
        $_SESSION['radicado'] = "SI";
        $_SESSION['nombre_radicado'] = $nombre;
        $_SESSION['num_servicio_radicado'] = $num_servicio;
        $_SESSION['fecha_radicado'] = $fecha;
        $_SESSION['tipo_radicado'] = $servicio;
        $_SESSION['email_radicado'] = $email;
        echo '<script> location.href="../../Views/servicios/radicado.php" </script>';
       

    }
    public function registrarReclamo($nombre, $email, $motivo, $detalle, $foto, $estado, $fecha){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $num_servicio = uniqid();
        $servicio = "Reclamo";

        $insertar = "INSERT INTO pqr_servicios(num_servicio, nombre, email, motivo, detalle, foto, estado, fecha, tipo_servicio) VALUES(:num_servicio,:nombre,:email,:motivo,:detalle,:foto,:estado,:fecha, :tipo_servicio)";
        
        $result = $conexion->prepare($insertar);
        
        $result->bindParam(':num_servicio',$num_servicio);
        $result->bindParam(':nombre',$nombre);
        $result->bindParam(':email',$email);
        $result->bindParam(':motivo',$motivo);
        $result->bindParam(':detalle',$detalle);
        $result->bindParam(':foto',$foto);
        $result->bindParam(':estado',$estado);
        $result->bindParam(':fecha',$fecha);
        $result->bindParam(':tipo_servicio',$servicio);
        
        $result->execute();

        session_start();
        
        $_SESSION['radicado'] = "SI";
        $_SESSION['nombre_radicado'] = $nombre;
        $_SESSION['num_servicio_radicado'] = $num_servicio;
        $_SESSION['fecha_radicado'] = $fecha;
        $_SESSION['tipo_radicado'] = $servicio;
        $_SESSION['email_radicado'] = $email;
        echo '<script> location.href="../../Views/servicios/radicado.php" </script>';
       

    }
    public function buscarConsulta($id_consulta){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT * FROM pqr_servicios WHERE num_servicio = :num_servicio";
        $result = $conexion ->prepare($consultar);

        $result->bindParam(':num_servicio',$id_consulta);
        $result->execute();

        if ($result->rowCount() > 0) {
            // Obtener los detalles de la consulta como un objeto asociativo
            $datos = $result->fetch(PDO::FETCH_ASSOC);
            // Convertir los datos a JSON y enviarlos
            echo json_encode($datos);
        } else {
            echo 'fallo';
        }
    }

    public function consultarProductMini($id_vendedor){

        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT count(*) as total FROM products where id_vendedor = :id_vendedor";

        $result = $conexion->prepare($consultar);
        $result->bindParam(':id_vendedor',$id_vendedor);

        $result->execute();

        //Al hacer una consulta para mostrar informacion necesitamos convertir el resultado en un arreglo para poder segmentar dato por dato

        while ($resultado = $result->fetch()) {
            $f[]= $resultado;


        }return $f;

    }

    public function constularVentasMini($id_vendedor){

        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT COUNT(id_producto) as ventas  FROM detalle_factura inner join products on detalle_factura.id_producto = products.id_pro where products.id_vendedor = :id_vendedor ";

        $result = $conexion->prepare($consultar);
        $result->bindParam(':id_vendedor',$id_vendedor);

        $result->execute();

        //Al hacer una consulta para mostrar informacion necesitamos convertir el resultado en un arreglo para poder segmentar dato por dato

        while ($resultado = $result->fetch()) {
            $f[]= $resultado;


        }return $f;

    }
    public function consultarRueda($id_vendedor){

        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT COUNT(id_producto) as ventas, products.nombre  FROM detalle_factura inner join products on detalle_factura.id_producto = products.id_pro where products.id_vendedor = :id_vendedor GROUP by detalle_factura.id_producto ";

        $result = $conexion->prepare($consultar);

        $result->bindParam(':id_vendedor',$id_vendedor);

        $result->execute();

        //Al hacer una consulta para mostrar informacion necesitamos convertir el resultado en un arreglo para poder segmentar dato por dato

        while ($resultado = $result->fetch()) {
            $f[]= $resultado;


        }return $f;

    }

    public function buscarProducto($producto){
        $f= null;
        
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
    
        // Usamos "%" para buscar coincidencias parciales en el nombre del producto
        $nombreProducto = '%' . $producto . '%';
    
        $consultar = "SELECT * FROM products WHERE nombre LIKE :nombre";
        $result = $conexion->prepare($consultar);
    
        $result->bindParam(':nombre', $nombreProducto);
        $result->execute();
    



        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }


    public function calificarProducto(){
        $id_usuario = $_SESSION['id'];
        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT SUBSTRING(p.descripcion, 1, 60) AS descripcion ,f.fecha_emision, p.foto, p.id_pro, p.nombre,  COUNT(d.cantidad) AS cantidad_total, COUNT(d.cantidad) * p.precio AS total_precio FROM factura f inner JOIN detalle_factura  d on d.id_factura = f.id_factura INNER join products p on d.id_producto = p.id_pro WHERE f.id_usuario = :id_usuario GROUP by d.id_producto ";

        $result = $conexion->prepare($consultar);
        $result->bindParam(':id_usuario', $id_usuario);
        $result->execute();

        //Al hacer una consulta para mostrar informacion necesitamos convertir el resultado en un arreglo para poder segmentar dato por dato

        while ($resultado = $result->fetch()) {
            $f[]= $resultado;


        }return $f;

    }

    public function contarCalificaciones(){
        $id_usuario = $_SESSION['id'];
        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT COUNT(DISTINCT p.id_pro) AS cantidad_productos FROM factura f INNER JOIN detalle_factura d ON d.id_factura = f.id_factura INNER JOIN products p ON d.id_producto = p.id_pro WHERE f.id_usuario = :id_usuario";

        $result = $conexion->prepare($consultar);
        $result->bindParam(':id_usuario', $id_usuario);
        $result->execute();

        //Al hacer una consulta para mostrar informacion necesitamos convertir el resultado en un arreglo para poder segmentar dato por dato

        while ($resultado = $result->fetch()) {
            $f[]= $resultado;


        }return $f;

    }

    public function generarDetalleCalificacion($id_producto){
        $id_usuario = $_SESSION['id'];
        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT SUBSTRING(p.descripcion, 1, 60) AS descripcion ,f.fecha_emision, p.foto, p.id_pro, p.nombre,  COUNT(d.cantidad) AS cantidad_total, COUNT(d.cantidad) * p.precio AS total_precio , e.direccion_facturacion, e.ciudad, f.numero_factura FROM factura f inner JOIN detalle_factura  d on d.id_factura = f.id_factura INNER join products p on d.id_producto = p.id_pro INNER JOIN detalles_envio e on e.id_factura = f.id_factura WHERE f.id_usuario = :id_usuario AND p.id_pro = :id_pro GROUP by d.id_producto ";

        $result = $conexion->prepare($consultar);
        $result->bindParam(':id_usuario', $id_usuario);
        $result->bindParam(':id_pro', $id_producto);
        $result->execute();

        //Al hacer una consulta para mostrar informacion necesitamos convertir el resultado en un arreglo para poder segmentar dato por dato

        while ($resultado = $result->fetch()) {
            $f[]= $resultado;


        }return $f;

    }

    public function insertarCalificacionProducto($id_producto,$calificacion,$id_usuario){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $insertar = "INSERT INTO opinion_producto(id_producto, id_usuario, calificacion) VALUES(:id_producto, :id_usuario, :calificacion)";
        
        $result = $conexion->prepare($insertar);
        
        $result->bindParam(':id_producto',$id_producto);
        $result->bindParam(':id_usuario',$id_usuario);
        $result->bindParam(':calificacion',$calificacion);

        
        $result->execute();
        echo '<script> location.href="../../Views/user/opinion.php?id='.$id_producto.'"</script>';

    }

    public function verCalificacionProducto($id_producto){
        $id_usuario = $_SESSION['id'];
        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT calificacion FROM opinion_producto WHERE id_producto = :id_producto AND id_usuario = :id_usuario";

        $result = $conexion->prepare($consultar);
        $result->bindParam(':id_producto', $id_producto);
        $result->bindParam(':id_usuario', $id_usuario);
        $result->execute();

        //Al hacer una consulta para mostrar informacion necesitamos convertir el resultado en un arreglo para poder segmentar dato por dato

        while ($resultado = $result->fetch()) {
            $f[]= $resultado;


        }return $f;


    }

    public function cambiarOpinionProducto($id_producto,$calificacion,$id_usuario){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $actualizar = "UPDATE opinion_producto SET calificacion = :calificacion WHERE id_producto = :id_producto AND id_usuario = :id_usuario;";
        
        $result = $conexion->prepare($actualizar);
        
        $result->bindParam(':calificacion',$calificacion);
        $result->bindParam(':id_producto',$id_producto);
        $result->bindParam(':id_usuario',$id_usuario);

        
        $result->execute();
        echo '<script> location.href="../../Views/user/opinion.php?id='.$id_producto.'"</script>';

    }

    public function mostrarCalificacion($id_producto){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT id_producto, SUM(calificacion) AS suma_calificaciones, COUNT(calificacion) as cantidad_votos FROM opinion_producto WHERE id_producto = :id_producto";
        $result = $conexion ->prepare($consultar);

        $result->bindParam(':id_producto',$id_producto);
        $result->execute();


        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }
    public function mostrarCalificacionIndex($id_producto){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT id_producto, SUM(calificacion) AS suma_calificaciones, COUNT(calificacion) as cantidad_votos FROM opinion_producto WHERE id_producto = :id_producto";
        $result = $conexion ->prepare($consultar);

        $result->bindParam(':id_producto',$id_producto);
        $result->execute();


        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }
    
    public function consultarVentasProducto($id_producto){
        $f= null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();


        $consultar = "SELECT count(id_producto) as cantidad_ventas FROM detalle_factura WHERE id_producto = :id_producto";
        $result = $conexion ->prepare($consultar);

        $result->bindParam(':id_producto',$id_producto);

        $result->execute();

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }


}



    

?>