

<?php
	use FTP\Connection;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../PHPMailer/Exception.php';
	require '../PHPMailer/PHPMailer.php';
	require '../PHPMailer/SMTP.php';

  require_once("../Models/conexion_db.php");
  require_once("../Models/consultasGlobal.php");
  require_once("../Models/consultasAdmin.php");
  
  


    session_start();


    if (!isset($_SESSION['autenticado'])){
        echo'<script>alert("Por favor inicie sesión")</script>';
        // echo"<script>location.href='../Views/extras/page-login.html'</script>";
    }
	if ((!isset($_SESSION['pagoCompleto']))){
        echo'<script>alert("No has terminado de realizar la selección de los productos")</script>';
        // echo"<script>location.href='../Views/extras/mostrarCarrito.php'</script>";
    }
	
	// if(empty($_SESSION['carrito'])) { 
	// 	echo'<script>alert("No has terminado de realizar la selección de los productos")</script>';
	// 	// echo"<script>location.href='../Views/extras/mostrarCarrito.php'</script>";
	// }
	$_SESSION['borrar'] = "si";
	$id_factura = $_GET['id_factura'];


	$objConsultas = new ConsultasAdmin();
    $result = $objConsultas->crearFactura($id_factura);
	$productosFactura = $objConsultas->productosFactura($id_factura);
	foreach ($result as $f) {
		$nombre = $f['nombre'];
		$telefono = $f['numero_cel'];


		# Incluyendo librerias necesarias #
		require "./code128.php";

		$pdf = new PDF_Code128('P','mm','Letter');
		$pdf->SetMargins(17,17,17);
		$pdf->AddPage();

		# Logo de la empresa formato png #
		$pdf->Image('../Views/client-side/images/decrochea.png',135,10,70,40,'png');

		# Encabezado y datos de la empresa #
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->SetTextColor(224, 142, 177);
		$pdf->Cell(150, 10, strtoupper("DeCroche"), 0, 0, 'L'); 
		$pdf->SetTextColor(0, 0, 0);

		$pdf->Ln(9);

		$pdf->SetFont('Arial','',10);
		$pdf->SetTextColor(39,39,51);
		$pdf->Cell(150,9,iconv("UTF-8", "ISO-8859-1","RUC: 0000000000"),0,0,'L');

		$pdf->Ln(5);

		$pdf->Cell(150,9,iconv("UTF-8", "ISO-8859-1","Bogotá, Colombia"),0,0,'L');

		$pdf->Ln(5);

		$pdf->Cell(150,9,iconv("UTF-8", "ISO-8859-1","Teléfono: 320992827"),0,0,'L');

		$pdf->Ln(5);

		$pdf->Cell(150,9,iconv("UTF-8", "ISO-8859-1","Email: soportedecroche@gmail.com"),0,0,'L');

		$pdf->Ln(10);

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(30,7,iconv("UTF-8", "ISO-8859-1","Fecha de emisión:"),0,0);
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(116,7,iconv("UTF-8", "ISO-8859-1",date("d/m/Y")));
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(39,39,51);
		$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",strtoupper("Factura Nro.")),0,0,'C');

		$pdf->Ln(7);

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(12,7,iconv("UTF-8", "ISO-8859-1","Cajero:"),0,0,'L');
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(134,7,iconv("UTF-8", "ISO-8859-1","Daniel Giglioli"),0,0,'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",$id_factura),0,0,'C');

		$pdf->Ln(10);

		$pdf->SetFont('Arial','',10);
		$pdf->SetTextColor(39,39,51);
		$pdf->Cell(13,7,iconv("UTF-8", "ISO-8859-1","Cliente:"),0,0);
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(60,7,iconv("UTF-8", "ISO-8859-1",($nombre)),0,0,'L');
		$pdf->SetTextColor(39,39,51);
		$pdf->Cell(8,7,iconv("UTF-8", "ISO-8859-1","Doc: "),0,0,'L');
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(60,7,iconv("UTF-8", "ISO-8859-1",($_SESSION['documento'])),0,0,'L');
		$pdf->SetTextColor(39,39,51);
		$pdf->Cell(7,7,iconv("UTF-8", "ISO-8859-1","Tel:"),0,0,'L');
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",($telefono)),0,0);
		$pdf->SetTextColor(39,39,51);

		$pdf->Ln(7);


		$pdf->Ln(9);

		# Tabla de productos #
		$pdf->SetFont('Arial','',8);
		$pdf->SetFillColor(23,83,201);
		$pdf->SetDrawColor(23,83,201);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(90,8,iconv("UTF-8", "ISO-8859-1","Descripción"),1,0,'C',true);
		$pdf->Cell(15,8,iconv("UTF-8", "ISO-8859-1","Cant."),1,0,'C',true);
		$pdf->Cell(25,8,iconv("UTF-8", "ISO-8859-1","Precio_un"),1,0,'C',true);
		$pdf->Cell(19,8,iconv("UTF-8", "ISO-8859-1","Desc."),1,0,'C',true);
		$pdf->Cell(32,8,iconv("UTF-8", "ISO-8859-1","Subtotal"),1,0,'C',true);

		$pdf->Ln(8);

		
		$pdf->SetTextColor(39,39,51);

		/*----------  Detalles de la tabla  ----------*/

		
		if (!empty($productosFactura)) {
			$cantidad = 1; 
			$total = 0;
		
			// Procesar cada producto de la factura
			foreach ($productosFactura as $producto) {
				$total += $producto['subtotal'];
				$nombre = $producto['nombre_producto'];
				$cantidad = $producto['cantidad'];
				$precio_unitario = $producto['subtotal'] / $cantidad;
				$subtotal = number_format($producto['subtotal'], 0, '', '.');
		
				$pdf->Cell(90, 7, iconv("UTF-8", "ISO-8859-1", $nombre), 'L', 0, 'C');
				$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", $cantidad), 'L', 0, 'C');
				$pdf->Cell(25, 7, iconv("UTF-8", "ISO-8859-1", number_format($precio_unitario, 0, '', '.')), 'L', 0, 'C');
				$pdf->Cell(19, 7, iconv("UTF-8", "ISO-8859-1", "$0.00"), 'L', 0, 'C');
				$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", $subtotal), 'LR', 0, 'C');
				$pdf->Ln(7);
			}
		
			// Detalles de totales y otros datos de la factura
			$pdf->SetFont('Arial', 'B', 9);
		
			$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
			$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
			$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "SUBTOTAL"), 'T', 0, 'C');
			$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", number_format($productosFactura[0]['total'], 0, '', '.')), 'T', 0, 'C');
		
			$pdf->Ln(7);
		
			$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
			$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
			$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "IVA (0%)"), '', 0, 'C');
			$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+ $0.00 USD"), '', 0, 'C');
		
			$pdf->Ln(7);
		
			$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
			$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
		
			$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL A PAGAR"), 'T', 0, 'C');
			$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", number_format($productosFactura[0]['total'], 0, '', '.')), 'T', 0, 'C');
		
			$pdf->Ln(7);
		
			$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
			$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
			$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL PAGADO"), '', 0, 'C');
			$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", number_format($productosFactura[0]['total'], 0, '', '.')), '', 0, 'C');
		
			$pdf->Ln(7);
		
			$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
			$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
		
			$pdf->Ln(12);
		
			$pdf->SetFont('Arial', '', 9);
		
			$pdf->SetTextColor(39, 39, 51);
			$pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"), 0, 'C', false);
		
			$pdf->Ln(9);
		}

		# Codigo de barras #
		$pdf->SetFillColor(39,39,51);
		$pdf->SetDrawColor(23,83,201);
		$pdf->Code128(72,$pdf->GetY(),$f['numero_factura'],70,20);
		$pdf->SetXY(12,$pdf->GetY()+21);
		$pdf->SetFont('Arial','',12);
		$pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",$f['numero_factura']),0,'C',false);

		# Nombre del archivo PDF #
		$pdf->Output("I","Factura_Nro_'.$id_factura.'.pdf",true);
		
		$pdfPath = "../facturas/Factura_Nro_$id_factura.pdf";

		# Guarda el PDF en el servidor
		$pdf->Output($pdfPath, 'F');
        

		$mail = new PHPMailer(true);
		try {
			//Server settings
			$mail->SMTPDebug = 0;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'decrochesoporte@gmail.com';                     //SMTP username
			$mail->Password   = 'geunoztwozoavfow';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			//emisor
			$mail->setFrom('decrochesoporte@gmail.com', 'SoporteDeCroche');
			//receptor
			$mail->addAddress($f['correo']); 
			//Add a recipient
			//$mail->addAddress('ellen@example.com');               //Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->CharSet = 'UTF-8';
			$mail->Subject = 'Factura de compra  - DeCroche';
			$mail->Body    = '
				<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<title>Facturas - DeCroche</title>
					<link rel="stylesheet" href="../animacion-inicio/facturas/dist/style.css">
					<link rel="preconnect" href="https://fonts.googleapis.com">
						<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
						<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

						<!-- Icon Font Stylesheet -->
						<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
						<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

						<!-- Libraries Stylesheet -->
						<link href="../animacion-inicio/carrito/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
						<link href="../animacion-inicio/carrito/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


						<!-- Customized Bootstrap Stylesheet -->
						<link href="../animacion-inicio/carrito/css/bootstrap.min.css" rel="stylesheet">

						<!-- Template Stylesheet -->
						<link href="../animacion-inicio/carrito/css/style.css" rel="stylesheet">

						<link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


						<style>
		#invoice-POS {
			max-width: 450px;
			box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
			padding: 5mm;
			margin: 20px;
			width: 80%;
			background: #FFF;
			float: left;
			margin-right: 20px;
			margin-bottom: 20px;
		}
		
		#invoice-POS h1,
		#invoice-POS h2,
		#invoice-POS h3,
		#invoice-POS p {
			font-size: 1em;
			color: #222;
			line-height: 1.5em;
		}
		
		#invoice-POS #top,
		#invoice-POS #mid,
		#invoice-POS #bot {
			border-bottom: 1px solid #EEE;
		}
		
		#invoice-POS #top {
			min-height: 100px;
		}
		
		#invoice-POS #mid {
			min-height: 80px;
		}
		
		#invoice-POS #bot {
			min-height: 50px;
		}
		
		#invoice-POS #top .logo {
			height: 80px;
			width: 80px;
			background: url(https://raw.githubusercontent.com/chechojgb/images/main/conejo.jfif) no-repeat;
			background-size: 80px 80px;
			border-radius: 40%;
		}
		
		#invoice-POS .clientlogo {
			float: left;
			height: 60px;
			width: 60px;
			background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
			background-size: 60px 60px;
			border-radius: 50px;
		}
		
		#invoice-POS .info {
			display: block;
			margin-left: 0;
		}
		
		#invoice-POS .title {
			float: right;
		}
		
		#invoice-POS .title p {
			text-align: right;
		}
		
		#invoice-POS table {
			width: 100%;
			border-collapse: collapse;
		}
		
		#invoice-POS .tabletitle {
			font-size: 0.5em;
			background: #EEE;
		}
		
		#invoice-POS .service {
			border-bottom: 1px solid #EEE;
		}
		
		#invoice-POS .item {
			width: 24mm;
		}
		
		#invoice-POS .itemtext {
			font-size: 1.5em;
		}
		
		#invoice-POS #legalcopy {
			margin-top: 5mm;
		}
		
		#invoice-POS:nth-child(3n) {
			clear: both;
		}

		</style>
				</head>
				<body>
					<div id="invoice-POS">
					<center id="top">
						<div class="logo"></div>
						<div class="info"> 
							<h2>Factura N-'.$id_factura.'</h2>
						</div><!--End Info-->
					</center><!--End InvoiceTop-->
					
					<div id="mid">
						<div class="info">
							<h2>Información de factura</h2>
							<p> 
								Dirección: '.$f['direccion_facturacion'].'<br><br>
								Ciudad: '.$f['ciudad'].'<br><br>
								Correo: '.$f['correo'].'<br><br>
								Telefono: '.$f['numero_cel'].'<br><br>
								nombre: '.$f['nombre'].' <br>
							</p>
						</div>
					</div><!--End Invoice Mid-->
					
					<div id="bot">
						<div id="table">
							<table>
								<tr class="tabletitle">
									<td class="item" style="padding-left: 10px"><h2 style="font-size: 10px">Producto</h2></td>
									<td class="Hours" style="padding-left: 25px">   <h2 style="font-size: 10px">Cant</h2></td>
									<td class="Rate" style="padding-left: 15px"><h2 style="font-size: 13px">Sub Total</h2></td>
								</tr>';

			// Genera el contenido del bucle antes de la cadena HTML
			if (!empty($productosFactura)) {
				$cantidad = 1; 
				$total = 0;
			
				// Procesar cada producto de la factura
				foreach ($productosFactura as $producto) {
					$total += $producto['subtotal'];
					$nombre = $producto['nombre_producto'];
					$cantidad = $producto['cantidad'];
					$precio_unitario = $producto['subtotal'] / $cantidad;
					$subtotal = number_format($producto['subtotal'], 0, '', '.');
			
					$mail->Body .= '
							<tr class="service">
								<td class="tableitem"><p class="itemtext" style="font-size: 13px; padding-left: 10px">' . $nombre . '</p></td>
								<td class="tableitem" style="padding-left: 30px"><p class="itemtext" style="font-size: 13px">' . $cantidad . '</p></td>
								<td class="tableitem" style="padding-left: 15px"><p class="itemtext" style="font-size: 13px">$'.$subtotal.'</p></td>
							</tr>
									
									';
				}
			}


			// Continúa con el resto de tu código HTML
			$mail->Body .= '
								<tr class="tabletitle">
									<td></td>
									<td class="Rate"><h2 style="font-size: 20px">Total</h2></td>
									<td class="payment"><h2 style="font-size: 20px">$'.number_format($f['total'], 0  ,'', '.').'</h2></td>
								</tr>
							</table>
						</div><!-- End Table -->

						<div id="legalcopy">
							<p class="legal"><strong>Gracias por comprar con DeCroche!</strong> te esperamos en la siguiente compra</p>
						</div>
					</div>
				</body>
				</html>';
			$pdfPath = "../facturas/Factura_Nro_$id_factura.pdf";
			$mail->addAttachment($pdfPath, "Factura_Nro_$id_factura.pdf");
			$mail->send();
			
		} catch (Exception $e) {
			echo "ERROR: {$mail->ErrorInfo}";
		}




		
	}
	unset($pdf);
	unset($_SESSION['carrito']);
	unset($_SESSION['correo']);
	unset($_SESSION['id_factura']);





	
?>
