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

$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);   
$password	= filter_var($_POST['password'],FILTER_SANITIZE_STRING);


	$sthandler = $handler->prepare("SELECT * FROM fornecedores WHERE username = :username");
	$sthandler->bindParam(':username', $username);
	$sthandler->execute();
	
	$result=$sthandler->fetchAll();
	foreach($result as $row)
	{
		$hashAndSalt=$row['password'];
	};
	

	if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'])
	{
		$secret = "6Lca-xcTAAAAANpZr-s97Ut3neVNiJX4rzmzNdMH";
		$ip = $_SERVER['REMOTE_ADDR'];
		$captcha = $_POST['g-recaptcha-response'];
		$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
		$arr = json_decode($rsp,TRUE);

		if($arr['success'])
		{
				if(!password_verify($password, $hashAndSalt))
				{
					
					$_SESSION["login"] = 0;
					header('location:'.BASE_URL.'dadosincorrectospage.php');
					
				} 
				else 
				{
					
					foreach($result as $row)
						$nome=$row['nome'];
						
					$_SESSION["login"] = 2; 
					$_SESSION["username"] = $username;
					$_SESSION["nome"]= $nome;
					header('Location:'.BASE_URL.'areafornecedorPage.php');
				}
		}

	}
	else
	{
		header('Location:'.BASE_URL.'loginPage.php');
	}

		
	

?>