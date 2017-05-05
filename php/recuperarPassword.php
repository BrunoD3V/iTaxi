<?php

require("PHPMailer/class.phpmailer.php");
include 'db_const.php';
		
$email    = (trim($_POST['email']));

try {
    $handler = new PDO(DB_HOST,DB_USER, DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}
	function random_str($length, $keyspace )
	{
		$str = '';
		$max = mb_strlen($keyspace, '8bit') - 1;
		for ($i = 0; $i < $length; ++$i) {
			$str .= $keyspace[mt_rand(0, $max)];
		}
		return $str;
	}

	$length = 8;
	$keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$sthandler = $handler->prepare("SELECT password FROM clientes WHERE email = :email");
	$sthandler->bindParam(':email', $email);
	$sthandler->execute();


	if($sthandler->rowCount() == 1){
		
	$password = random_str($length, $keyspace);
	$hashAndSalt = password_hash($password, PASSWORD_DEFAULT);
	
	
	$sthandler = $handler->prepare("UPDATE clientes SET password = :password  WHERE email = :email");
	$sthandler->bindParam(':email', $email);
	$sthandler->bindParam(':password', $hashAndSalt);
	$sthandler->execute();	
		
		
	

	$body=" Password da conta:
		Email: $email;
		Password: $password;";

	$Email = new PHPMailer();
 
	$Email->IsSMTP();  // telling the class to use SMTP

	$Email->SMTPAuth = true; //Ativa e-mail autenticado
	$Email->Host = 'smtp.gmail.com'; // Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
	$Email->Port = '465'; // Porta de envio
	$Email->SMTPSecure = 'ssl';
	$Email->Username = 'itaxiproject@gmail.com'; //e-mail que será autenticado
	$Email->Password = 'itaxi123*'; //
	$Email->From     = "itaxiproject@gmail.com";
	$Email->AddAddress($email);

	$Email->Subject  = "Recuperação de password";
	$Email->Body     = $body;
	$Email->WordWrap = 50;

	if(!$Email->Send()) {
	  echo 'Message was not sent.';
	  echo 'Mailer error: ' . $Email->ErrorInfo;
	} else {
		header('Location:'.BASE_URL.'loginPage.php');
	}
	}
	else{
		header('Location:'.BASE_URL.'userinvalidopage.php');
	}
?>
