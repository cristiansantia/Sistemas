<?php
require('../reportes/fpdf/fpdf.php');
include("../reportes/conexion.php");
$conexion=conectar();
class PDF extends FPDF
{
	var $widths;
	var $aligns;

	function SetWidths($w)
	{
	//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a)
	{
	//Set the array of column alignments
		$this->aligns=$a;
	}

	function Row($data)
	{
	//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=5*$nb;
	//Issue a page break first if needed
		$this->CheckPageBreak($h);
	//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
		//Draw the border

			$this->Rect($x,$y,$w,$h);

			$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
	//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
	//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
	//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function Header()
	{
		$this->Image('imagenes/cecyte.jpg' , 20 ,8, 23 , 22,'JPG');
		$this->Image('imagenes/cecyte1.jpg' , 163 ,10, 35 , 22,'JPG');
		$this->SetFont('Arial','B',11);
		$this->Text(51,25,utf8_decode('PARROQUIA ARCÁNGEL SAN MIGUEL SENSUNTEPEQUE'),0,'C', 0);
		$this->SetFont('Arial','',11);
		$this->Text(59,32,utf8_decode('Pasaje B1 Colonia El Nazareno, Barrio Santa Bárbara'),0,'C', 0);
		$this->SetFont('Arial','',11);
		$this->Text(82,38,utf8_decode('Teléfono: (503) 2397 - 8153 '),0,'C', 0);
		$this->SetFont('Arial','B',12);
		$this->Text(90,55,utf8_decode('FE DE BAUTISMO'),0,'C', 0);
		$this->Ln(27);
	}

}
$num= $_POST['clave'];

//$strConsulta = "SELECT * FROM personas where id_persona =  1";
$parametros1 = "SELECT
parametros.id,
parametros.nombre_parroquia,
sacerdote.nombre
FROM
parametros
INNER JOIN sacerdote ON parametros.parroco = sacerdote.id_sacerdote";
$parametros2 = mysql_query($parametros1);
$parametros = mysql_fetch_array($parametros2);

$strConsulta = "SELECT
bautismo.id_bautismos,/* 0*/
bautismo.padrino1,/* 1 */
bautismo.padrino2,/* 2*/
bautismo.libro,/* 3*/
bautismo.ano,/* 4*/
bautismo.pag,/* 5*/
bautismo.edad,/* 6*/
sacerdote.nombre,/* 7*/
personas.nombres,/* 8*/
personas.apellido,/* 9*/
personas.genero,/* 10*/
personas.nombre_madre,/* 11*/
personas.apellidos_madre,/* 12*/
personas.nombre_padre,/* 13*/
personas.apellidos_padre,/* 14*/
parametros.parroco,/* 15*/
parametros.nombre_parroquia,/* 16*/
bautismo.fecha_bautismo/*17*/
FROM
bautismo
INNER JOIN sacerdote ON bautismo.sacerdote = sacerdote.id_sacerdote
INNER JOIN personas ON bautismo.id_persona = personas.id_persona
INNER JOIN parametros ON parametros.parroco = sacerdote.id_sacerdote
WHERE personas.id_persona = $num";
$confirma = mysql_query($strConsulta);
$fila = mysql_fetch_array($confirma);

setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$d = $fila[17];
$fecha = strftime("%d dias del mes de %B de %Y", strtotime($d));

if ($fila[10] ==1 ) {
	$hijo = "hija legítima";
} else {
	$hijo = "hijo legítimo";
}

if ($fila[2]!= null) {
	$padrino= "fueron sus padrinos ".$fila[1]." y ".$fila[2];
} else {
	$padrino="fue su padrino ". $fila[1];
}

if ($fila[13]!= null) {
	$padres= $fila[11]." ".$fila[12]." y ".$fila[13]." ".$fila[14];
} else {
	if ($fila[13]= null) {
		$padres= $fila[11]." ".$fila[12];
	} else {
		if ($fila[11]= null) {
			$padres= $fila[13]." ".$fila[14];
		}
	}	
}


$pdf=new PDF('P','mm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetMargins(30,20,20);
$pdf->Ln(35);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(150,8,  
	utf8_decode ('El infrascrito párroco de la Parroquia Arcángel San Miguel en la ciudad de Sensuntepeque certifica que: en el libro de bautismo número '
		.utf8_decode($fila['libro']).', página número: ')
	.utf8_decode($fila['pag'].' del año '.$fila['ano'])
	.utf8_decode('; se encuentra la que literalmente dice: en la Parroquia Arcángel San Miguel de Sensuntepeque, Diócesis de San Vicente a los ')
	.utf8_decode($fecha.', el presbítero '
		.utf8_decode($fila['nombre']).' Bautizó solemnemente a: '.utf8_decode($fila['nombres']).' '.utf8_decode($fila['apellido']).' de '.$fila['edad'].' años de edad '.$hijo.' de: '
		.$padres.', '.$padrino.'.') ,0,'J', 0);


$dias = array("domingo","lunes","martes","miércoles","jueves","viernes","sábado");
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
$pdf->ln(8);

$pdf->MultiCell(150,8,utf8_decode('La presente es copia fiel del original con la cual se confrontó, se extiende la presente para los usos que se estimen convenientes a los '." "
	.date('d')." días del mes ".$meses[date('n')-1]. " de  ".date('Y')."." ),0,'J');


$pdf->Ln(50);

$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(255);
		//$strConsulta = "SELECT * FROM sacerdote where id_sacerdote =  1";
		//$alumno = mysql_query($strConsulta);
		//$filai = mysql_fetch_array($alumno);

	$pdf->SetXY(95, 235);
    $pdf->Cell(15, 4, '         ', 0, 0, 'C', 1);
	$pdf->SetXY(70, 240);
    $pdf->Cell(70, 5,utf8_decode('Pbro. '.utf8_decode($parametros[2])), 0, 0, 'C', 1);

	$pdf->SetXY(70, 245);
   $pdf->Cell(70, 5,utf8_decode('Párroco '.$parametros[1]), 0, 0, 'C', 1);

$y = 130;

$pdf->Ln(40);

$pdf->SetXY(100, 265);
$pdf->Cell(10, 6, '', 0, 0, 'C', 1);
$pdf->SetXY(70, 270);
$pdf->Cell(70, 5,utf8_decode (''), 0, 0, 'C', 1);
$pdf->Output('Bautismo.pdf','I');
?>
