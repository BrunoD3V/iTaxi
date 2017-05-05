<?php

session_start();

ini_set('default_charset','UTF-8');

include('php/db_const.php');


if (!isset($_SESSION['login']) || $_SESSION["login"]==0 || $_SESSION["login"]==2) 
	{
		header('Location:'.BASE_URL.'paginaRestritaPage.php');
	}

try {
    $handler = new PDO(DB_HOST,DB_USER,DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}

require('librarias/fpdf/pdflib.php');

$username = $_SESSION['username'];



$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image(BASE_URL.'images/logo.png');

$pdf->SetFont('Arial', '', 20);
$pdf->Cell(150, 10, 'iTaxi Corporation', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Emitido em: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(150, 8, '', 0);
$pdf->Cell(15, 8, 'FATURA', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 8);


$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
if(!isset($error)){
	$sthandler = $handler->prepare("SELECT clienteID, nome,morada,nif FROM clientes WHERE username = :nome");
	$sthandler->bindParam(':nome', $username);
	$sthandler->execute();
	$result=$sthandler->fetchAll();
	foreach($result as $row)
	{
		$clienteid = $row['clienteID'];

		$nome= $row['nome'];
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(90);
		$pdf->Cell(15, 8, 'Nome:', 0, 0);
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(8);
		$pdf->Cell(15, 8,$nome, 0, 1);

		$morada = $row['morada'];
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(90);
		$pdf->Cell(15, 8, 'Morada:', 0, 0);
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(8);
		$pdf->Cell(15, 8, $morada , 0 , 1);

		$nif = $row['nif'];
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(90);
		$pdf->Cell(15, 8, 'NIF:', 0, 0);
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(8);
		$pdf->Cell(15, 8, $nif, 0, 1);
		$pdf->ln(20);
	}

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(50, 8, 'Data do Servico', 0, 0);
		$pdf->Cell(40, 8, 'Origem', 0, 0);
		$pdf->Cell(40, 8, 'Destino', 0, 0);
		$pdf->Cell(40, 8, 'Distancia', 0, 0);
		$pdf->Cell(40, 8, 'Custo', 0, 1);




	$sthandler2 = $handler->prepare("SELECT data, custo, destino, origem, distancia FROM servico WHERE clienteID = :clienteid");
	$sthandler2->bindParam(':clienteid', $clienteid);
	$sthandler2->execute();
	$result2=$sthandler2->fetchAll();

	$total=0;

	foreach($result2 as $row)
	{
		$data = $row['data'];
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(50, 8, $data, 0, 0);

		$origem = $row['origem'];
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 8, $origem , 0 , 0);

		$destino = $row['destino'];
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 8, $destino, 0, 0);

		$distancia = $row['distancia'];
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 8, $distancia, 0, 0);

		$custo = $row['custo'];
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 8, $custo, 0, 1);

		$total += $custo;
	}

	$pdf->ln(25);
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Cell(140);
	$pdf->Cell(15,8,'TOTAL:',0,0);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Cell(5);
	$pdf->Cell(10,8,$total,0,0);
	$pdf->Cell(5,8,'eur.',0,1);



}
$pdf->Output();
?>
