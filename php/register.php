<?php


session_start();

require("PHPMailer/class.phpmailer.php");
ini_set('default_charset','UTF-8');
include 'db_const.php';


function alerta(){
		echo '<script language="javascript">';
		echo 'alert("User Já existe");';
		echo 'window.location.replace("http://193.137.101.50/webdev2016/alunos/bruno/web/loginPage.php");';
		echo '</script>';
}

//Conex?es
try {
    $handler = new PDO(DB_HOST,DB_USER, DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}

	$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);   
	$nome = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);
	$password	= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
	$morada	= filter_var($_POST['morada'],FILTER_SANITIZE_STRING);
	$nif	= filter_var($_POST['nif'],FILTER_SANITIZE_STRING);
	$telemovel	= filter_var($_POST['telemovel'],FILTER_SANITIZE_STRING);
	$email	= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
	$confpassword = filter_var($_POST['confpassword'],FILTER_SANITIZE_STRING);
	$pais =  filter_var($_POST['pais'],FILTER_SANITIZE_STRING);
	$hashAndSalt = password_hash($password, PASSWORD_DEFAULT);
	
	

	if (strlen($password) <= 7 || $password!=$confpassword){
    	echo '<script language="javascript">';
		echo 'alert("Não introduziu uma password forte ou elas não coincidem.");';
		echo 'window.location.replace("http://193.137.101.50/webdev2016/alunos/bruno/web/loginPage.php");';
		echo '</script>';
    	exit();
	
	}



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
		alerta();
		exit();
	} else {
		//Securly insert into database
		$sql = 'INSERT INTO clientes (username, password, nome, morada, nif, telemovel, email, pais) VALUES (:username, :password,:nome,:morada,:nif, :telemovel,:email, :pais)';    
		$query = $handler->prepare($sql);

		$query->execute(array(
		':username' => $username,
		':password' => $hashAndSalt,
		':nome' => $nome,
		':morada' => $morada,
		':nif' => $nif,
		':telemovel'=>$telemovel,
		':email' => $email, 
		':pais' => $pais
		 ));
		}


		
		
						$mensagem=" Registo efetuado com sucesso!!
									Username: $username
									Email: $email";


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

						$Email->Subject  = "Registo efetuado com sucesso";
						$Email->Body     = $mensagem;
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
		echo '<script language="javascript">';
		echo 'alert("Registo efetuado com sucesso");';
		echo 'window.location.replace("http://193.137.101.50/webdev2016/alunos/bruno/web/loginPage.php");';
		echo '</script>';
	



