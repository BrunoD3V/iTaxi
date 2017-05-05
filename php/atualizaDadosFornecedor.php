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
$nome = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);   
$morada = filter_var($_POST['morada'],FILTER_SANITIZE_STRING);   
$nif	= filter_var($_POST['nif'],FILTER_SANITIZE_STRING);
$telefone	= filter_var($_POST['telefone'],FILTER_SANITIZE_STRING);
$email	= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
$username =$_SESSION['username'];

if(!empty($nome))
	if(!isset($error)){
		$sthandler = $handler->prepare("UPDATE fornecedores SET nome = :nome WHERE username = :username");
		$sthandler->bindParam(':username', $username);
		$sthandler->bindParam(':nome', $nome);
		$sthandler->execute();		
	}
	
if(!empty($morada))
	if(!isset($error)){
		$sthandler = $handler->prepare("UPDATE fornecedores SET morada = :morada WHERE username = :username");
		$sthandler->bindParam(':username', $username);
		$sthandler->bindParam(':morada', $morada);
		$sthandler->execute();		
	}	

if(!empty($nif))
	if(!isset($error)){
		$sthandler = $handler->prepare("UPDATE fornecedores SET nif = :nif WHERE username = :username");
		$sthandler->bindParam(':username', $username);
		$sthandler->bindParam(':nif', $nif);
		$sthandler->execute();		
	}	

if(!empty($telefone))
	if(!isset($error)){
		$sthandler = $handler->prepare("UPDATE fornecedores SET telefone = :telefone WHERE username = :username");
		$sthandler->bindParam(':username', $username);
		$sthandler->bindParam(':telefone', $telefone);
		$sthandler->execute();		
	}		

if(!empty($email))
	if(!isset($error)){
		$sthandler = $handler->prepare("UPDATE fornecedores SET email = :email WHERE username = :username");
		$sthandler->bindParam(':username', $username);
		$sthandler->bindParam(':email', $email);
		$sthandler->execute();		
	}	

header('location:'.BASE_URL.'areafornecedorPage.php');

?>
