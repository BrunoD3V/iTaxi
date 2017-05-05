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


$matricula = filter_var($_POST['matricula'],FILTER_SANITIZE_STRING);   
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
	$stm = $handler->prepare("DELETE FROM viatura WHERE matricula = :matricula");
	$stm->bindParam(':matricula', $matricula);
	$stm->execute();
}


header( 'location:'.BASE_URL.'areafornecedorPage.php');

?>
