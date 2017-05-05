<?php
session_start();

ini_set('default_charset','UTF-8');
include 'db_const.php';


try {
    $handler = new PDO(DB_HOST,DB_USER,DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}


$username = $_SESSION['username'];
$passantiga	= filter_var($_POST['passantiga'],FILTER_SANITIZE_STRING);
$novapass = filter_var($_POST['novapass'],FILTER_SANITIZE_STRING);
$reppass = filter_var($_POST['reppass'],FILTER_SANITIZE_STRING);


if($novapass == $reppass){
	
	
	$sthandler = $handler->prepare("SELECT * FROM fornecedores WHERE username = :nome");
	$sthandler->bindParam(':nome', $username);
	$sthandler->execute();
	$result=$sthandler->fetchAll();
	foreach($result as $row)
	{
		$hashAndSalt=$row['password'];
	};
	if(!password_verify($passantiga, $hashAndSalt))
		header('location:'.BASE_URL.'dadosincorrectospage.php');
	else{
		$hashAndSalt = password_hash($novapass, PASSWORD_DEFAULT);
		$sthandler = $handler->prepare("UPDATE fornecedores SET password = :password  WHERE username = :username");
		$sthandler->bindParam(':username', $username);
		$sthandler->bindParam(':password', $hashAndSalt);
		$sthandler->execute();	
		header('location:'.BASE_URL.'php/logout.php');
	}
}
else{
	echo '<script language="javascript">';
	echo 'alert("As passwords têm que coincidir");';
	echo 'window.location.replace("http://http://193.137.101.50/webdev2016/alunos/bruno/web/areafornecedorPage.php");';
	echo '</script>';
}


