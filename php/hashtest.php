<?php


session_start();

ini_set('default_charset','UTF-8');
include 'db_const.php';

//Conex?es
try {
    $handler = new PDO(DB_HOST,DB_USER, DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}

	$username = "burro4";  
	$nome = "riquinho";
	$password	= "xfds";
	$morada	= "a";
	$nif	= "123";
	$telemovel	= "9234";
	$email	= "a1234456@s.com";
	
	$hashAndSalt = password_hash($password, PASSWORD_DEFAULT);

	echo $hashAndSalt;






if(!isset($error)){
	//no error
	$sthandler = $handler->prepare("SELECT username FROM clientes WHERE username = :nome");
	$sthandler->bindParam(':nome', $username);
	//$sthandler->bindParam(':email', $email);
	$sthandler->execute();
	
	$sthandler1 = $handler->prepare("SELECT email FROM clientes WHERE email = :email");
	$sthandler1->bindParam(':email', $email);
	$sthandler1->execute();

	if($sthandler->rowCount() > 0 || $sthandler1->rowCount() >0){
		echo "o user j? existe";
		exit();
	} else {
		//Securly insert into database
		$sql = 'INSERT INTO clientes (username, password, nome, morada, nif, telemovel, email) VALUES (:username, :password,:nome,:morada,:nif, :telemovel,:email)';    
		$query = $handler->prepare($sql);

		$query->execute(array(
		':username' => $username,
		':password' => $hashAndSalt,
		':nome' => $nome,
		':morada' => $morada,
		':nif' => $nif,
		':telemovel'=>$telemovel,
		':email' => $email 
		 ));
		}
		echo "registado com sucesso";
	
}else{
    echo "error occured: ".$error;
    exit();
}

