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

$username = "burro4";   
$password1	= "xfds";

if(!isset($error)){
	$sthandler = $handler->prepare("SELECT * FROM clientes WHERE username = :nome");
	$sthandler->bindParam(':nome', $username);
	$sthandler->execute();
	$result=$sthandler->fetchAll();
	foreach($result as $row)
	{
		$hashAndSalt=$row['password'];
	};
	echo $hashAndSalt;
	if (password_verify($password1, $hashAndSalt)){
		echo "funciona";
	}
	else{
		echo "caralho";
	}
	
	if(!$sthandler->rowCount() == 1){
		
		$_SESSION["login"] = 0;
		echo
		
		header('Location:'.BASE_URL.'dadosincorrectospage.php');
	} else {
		$sthandler = $handler->prepare("SELECT nome FROM clientes WHERE username = :nome");
		$sthandler->bindParam(':nome', $username);
		$sthandler->execute();
		$result=$sthandler->setFetchMode(PDO::FETCH_ASSOC);
		
		
		
		$_SESSION["login"] = 1; 
		//$_SESSION["nome"] = $result[0];
		$_SESSION["username"] = $username;
		//$_pageLink = "http://192.168.1.7/PDO/projecto/areacliente.html"
		//header('Location: http://itaxi.esy.es/web/areaclientePage.php');
		
		
		// do stuffs
	}
	
		
	
}
?>
