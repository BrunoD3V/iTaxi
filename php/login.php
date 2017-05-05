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
if(!isset($_COOKIE['uName']))
{
	$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);   
	$password	= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
	$remember = isset($_POST['remember']) ? TRUE : FALSE;
}
else 
{
	$username = $_COOKIE['uName'];
	$password = $_COOKIE['uPass'];

} 

					$sthandler = $handler->prepare("SELECT * FROM clientes WHERE username = :nome");
					$sthandler->bindParam(':nome', $username);
					$sthandler->execute();
					$result=$sthandler->fetchAll();

					foreach($result as $row)
					{
						$hashAndSalt=$row['password'];
					};
				
				if($password==$hashAndSalt)
				{
					$_SESSION["login"] = 1; 
					$_SESSION["username"] = $username;
					$_SESSION["nome"]= $nome;
					header('location:'.BASE_URL.'areaclientePage.php');
					exit();
				}

/*if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'])
	{
		$secret = "6Lca-xcTAAAAANpZr-s97Ut3neVNiJX4rzmzNdMH";
		$ip = $_SERVER['REMOTE_ADDR'];
		$captcha = $_POST['g-recaptcha-response'];
		$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
		$arr = json_decode($rsp,TRUE);

		if($arr['success'])
		{*/
				
					
				if(!password_verify($password, $hashAndSalt)){
					
					$_SESSION["login"] = 0;
					$_SESSION["ERRO"] = 1;
					die(header("location:".BASE_URL."loginPage.php"));
					//header('location:'.BASE_URL.'loginpage.php');
					exit();
					
				} else {

					if($remember == TRUE)
					{
						setcookie('uName',$username, time() + 3600,'/');
						setcookie('uPass',$hashAndSalt, time() + 3600,'/');
					}	

					foreach($result as $row)
						$nome=$row['nome'];
						

					$_SESSION["login"] = 1; 
					$_SESSION["username"] = $username;
					$_SESSION["nome"]= $nome;
					header('location:'.BASE_URL.'areaclientePage.php');
					exit();
					}
				
		//}
		
	//}

	header('Location:'.BASE_URL.'loginPage.php')

	
		
	
?>
