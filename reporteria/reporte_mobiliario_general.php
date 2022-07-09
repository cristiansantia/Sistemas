<?php
	date_default_timezone_set("America/El_Salvador");  
	include("../programacion/conexion.php");
	include("fpdf/fpdf.php");

	//Información de la Institución
	$sqlInfoInstitucion = "SELECT * FROM institucion";
	$consultaInstitucion = mysqli_query($conexion, $sqlInfoInstitucion);
	$datosInstitucion = mysqli_fetch_array($consultaInstitucion);
	$logo = $datosInstitucion['logoinstitucion'];
	file_put_contents("./logo.jpg", $logo);

	$pdf=new FPDF('L','mm','A4');
	$pdf->SetMargins(2, 6 , 1);
	$pdf->AddPage();

	//Encabezado
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(53,10,utf8_decode("Nombre de la Institución: "), 0, 0, 'L');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(40,10, $datosInstitucion['nombreinst'], 0, 1);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(23,10,utf8_decode("Dirección: "), 0, 0, 'L');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(40,10, $datosInstitucion['direccioninst'], 0, 1);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(47,10,utf8_decode("Fecha de inventario al: "), 0, 0, 'L');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(30,10, date("d-m-Y"), 0, 1);
	$pdf->Image("./logo.jpg",230 ,5 ,35 ,35);
	unlink("logo.jpg");
	$pdf->SetFont('Arial','B',10);

	$pdf->Ln();
	
	$pdf->SetFillColor(215, 215, 215);
	$pdf->Cell(26, 10, utf8_decode("Código Inv."), 1, 0, 'C', True);
	$pdf->Cell(52, 10, utf8_decode("Descripción"), 1, 0, 'C', True);
	$pdf->Cell(14, 10, "Marca", 1, 0, 'C', True);
	$pdf->Cell(38, 10, "Modelo", 1, 0, 'C', True);
	$pdf->Cell(35, 10, "Serie", 1, 0, 'C', True);
	$pdf->Cell(20, 10, utf8_decode("Fecha Adq."), 1, 0, 'C', True);
	$pdf->Cell(15, 10, "Valor", 1, 0, 'C', True);
	$pdf->Cell(19, 10, "Calidad", 1, 0, 'C', True);
	$pdf->Cell(32, 10, "Tipo", 1, 0, 'C', True);
	$pdf->Cell(40, 10, "Asignado a", 1, 1, 'C', True);
	$pdf->SetFont('Arial','',9);

	//Consulta a la Base de Datos
	$sqlMobiliario = "SELECT 
						mob.codigomobiliario, mob.descripcion, mob.marca, mob.modelo, mob.serie, mob.fechaadquisicion, mob.precio, 
						cal.nombrecalidad , 	
						tip.nombretipo, 
						are.nombrearea 
					FROM 
						mobiliario mob 
					INNER JOIN calidades cal ON mob.idcalidad = cal.idcalidad
					INNER JOIN tipos tip ON mob.codigotipo = tip.codigotipo
					INNER JOIN areas are ON mob.idarea = are.idarea
					WHERE
						mob.activo = 1
					";

	$consultaMobiliario = mysqli_query($conexion, $sqlMobiliario);

	while ($data = mysqli_fetch_array($consultaMobiliario)) {
		$pdf->Cell(26, 8, $data['codigomobiliario'], 1, 0, 'C');
		$pdf->Cell(52, 8, ucfirst(strtolower($data['descripcion'])), 1, 0, 'C');
		$pdf->Cell(14, 8, $data['marca'], 1, 0, 'C');
		$pdf->Cell(38, 8, strtolower($data['modelo']), 1, 0, 'C');
		$pdf->Cell(35, 8, $data['serie'], 1, 0, 'C');
		$pdf->Cell(20, 8, $data['fechaadquisicion'], 1, 0, 'C');
		$pdf->Cell(15, 8, "$" . $data['precio'], 1, 0, 'C');
		$pdf->Cell(19, 8, $data['nombrecalidad'], 1, 0, 'C');
		$pdf->Cell(32, 8, $data['nombretipo'], 1, 0, 'C');
		$pdf->Cell(40, 8, $data['nombrearea'], 1, 1, 'C');
	}

	


	$pdf->Output("I", "Reporte General Mobiliario.pdf");
?>