<?php


session_start();

ini_set('default_charset','UTF-8');
include 'db_const.php';


function alertaUserExiste(){
		echo '<script language="javascript">';
		echo 'alert("User Já existe");';
		echo 'window.location.replace("http://itaxi.esy.es/loginpage.php");';
		echo '</script>';
}

function alertaRegistoEfetuado(){
		echo '<script language="javascript">';
		echo 'alert("Registo efetuado com sucesso!");';
		echo 'window.location.replace("http://itaxi.esy.es/loginpage.php");';
		echo '</script>';
}

//Conex?es
try {
    $handler = new PDO(DB_HOST,DB_USER, DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}

	$fornecedorID="3";
	$nome = "Táxis Fabio";
	$morada	= "Chaves";
	$nif	= "2341567843";
	$iban = "PT50-00000000000000000003";
	$telefone	= "278262215";
	$email	= "taxisfabio@gmail.com";
	$username = "fabio";  
	$password	= "fabio";
	$hashAndSalt = password_hash($password, PASSWORD_DEFAULT);

	






if(!isset($error)){
	//no error
	$sthandler = $handler->prepare("SELECT username FROM fornecedores WHERE username = :nome");
	$sthandler->bindParam(':nome', $username);
	$sthandler->execute();
	
	$sthandler1 = $handler->prepare("SELECT email FROM fornecedores WHERE email = :email");
	$sthandler1->bindParam(':email', $email);
	$sthandler1->execute();

	if($sthandler->rowCount() > 0 || $sthandler1->rowCount() >0){
		alertaUserExiste();
		exit();
	} else {
		//Securly insert into database
		$sql = 'INSERT INTO fornecedores (fornecedorID, nome, morada, nif, iban, telefone, email, username, password) VALUES (:fornecedorID, :nome,:morada,:nif,:iban, :telefone,:email, :username, :password)';    
		$query = $handler->prepare($sql);

		$query->execute(array(
		
		':fornecedorID'=>$fornecedorID,
		':nome' => $nome,
		':morada' => $morada,
		':nif' => $nif,
		':iban' => $iban,
		':telefone'=>$telefone,
		':email' => $email,
		':username' => $username,
		':password' => $hashAndSalt,
		
		 ));
		}
		alertaRegistoEfetuado();
	
}else{
    echo "error occured: ".$error;
    exit();
}

