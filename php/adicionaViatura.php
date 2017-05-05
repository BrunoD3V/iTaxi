<?php

ini_set('default_charset','UTF-8');
include 'db_const.php';

session_start();




try {
    $handler = new PDO(DB_HOST,DB_USER, DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}


$matricula = filter_var($_POST['matricula'],FILTER_SANITIZE_STRING);   
$modelo = filter_var($_POST['modelo'],FILTER_SANITIZE_STRING);   
$marca	= filter_var($_POST['marca'],FILTER_SANITIZE_STRING);
$ano	= filter_var($_POST['ano'],FILTER_SANITIZE_STRING);
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
	$stm = $handler->prepare("INSERT INTO viatura (fornecedorID, matricula, modelo, marca, ano)
									VALUES (:fornecedorID, :matricula, :modelo, :marca, :ano)");
	$stm->bindParam(':fornecedorID', $fornecedorID);
	$stm->bindParam(':matricula', $matricula);
	$stm->bindParam(':modelo', $modelo);
	$stm->bindParam(':marca', $marca);
	$stm->bindParam(':ano', $ano);
	$stm->execute();
	echo '<script language="javascript">';
	echo 'alert("Viatura introduzida com sucesso");';
	echo 'window.location.replace("http://http://193.137.101.50/webdev2016/alunos/bruno/web/areafornecedorPage.php");';
	echo '</script>';
	
}
	

?>
