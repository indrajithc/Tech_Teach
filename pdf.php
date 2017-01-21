
<?php
	$table =json_decode($_POST["table"]);
	//var_dump($table);
	
	
	require("assets/fpdf/fpdf.php");
	


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('assets/img/logo@2y.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Report',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}







$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$T_table = $table[0];
$count =count($T_table);
$count = 190/$count;
$i = 1;
foreach($table as $value) {
	 $j = 0;
	foreach($value as $data) {
		
		if (strpos($data, 'span') !== false) {
				$data = NULL;
			}
			
if (strpos($data, 'src') !== false) {
			$pieces = explode("src", $data);
				$data = $pieces[0]; // piece1
				$data =  $pieces[1];
				$data = get_string_between($data, '"../','" >');
				$data = NULL;
				
			}
if(strlen($data) >14) {
	$data = substr($data ,0,13);
}

		if($i == 1) {
			$pdf->SetFont('Arial','',12);
			$pdf->Cell($count,20, $data,1,'L');
		} else {
			$pdf->SetFont('Times','',12);
			$pdf->Cell($count,10, $data,1,'L');
			
		}
		
		
	 //$j++;
	 
		
	}
	$pdf->Ln();	
	$i++;
}



$pdf->Output();


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

?>
