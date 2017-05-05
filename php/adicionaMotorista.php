<?php
session_start();

ini_set('default_charset','UTF-8');
include 'db_const.php';





try {
    $handler = new PDO(DB_HOST,DB_USER, DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}


$nomemotorista = filter_var($_POST['nomemotorista'],FILTER_SANITIZE_STRING);
$morada =   filter_var($_POST['morada'],FILTER_SANITIZE_STRING); 
$telemovel = filter_var($_POST['telemovel'],FILTER_SANITIZE_STRING);
$username =$_SESSION['username'];

$sthandler = $handler->prepare("SELECT fornecedorID FROM fornecedores WHERE username = :username");
$sthandler->bindParam(':username', $username);
$sthandler->execute();


if($sthandler->rowCount() == 1){
	$result = $sthandler->fetchAll();
	foreach($result as $row)
	{
		$fornecedorID=$row['fornecedorID'];
	};
	$stm = $handler->prepare("INSERT INTO motoristas (nome, morada, telemovel)
									VALUES (:nomemotorista, :morada, :telemovel)");
	$stm->bindParam(':nomemotorista', $nomemotorista);
	$stm->bindParam(':morada', $morada);
	$stm->bindParam(':telemovel', $telemovel);
	$stm->execute();
	echo '<script language="javascript">';
	echo 'alert("Motorista introduzido com sucesso");';
	echo 'window.location.replace("http://http://193.137.101.50/webdev2016/alunos/bruno/web/areafornecedorPage.php");';
	echo '</script>';
}


?>
