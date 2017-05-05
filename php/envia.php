<?php  


		
		$nome     = (trim($_POST['nomeremetente']));
		$email    = (trim($_POST['emailremetente']));
		$assunto  = (trim($_POST['assunto']));
		$message = (trim($_POST['message']));
			
			require_once('PHPMailer/class.phpmailer.php');
			
			$Email = new PHPMailer();
			$Email->SetLanguage("pt");
			$Email->IsSMTP(); // Habilita o SMTP 
			$Email->SMTPAuth = true; //Ativa e-mail autenticado
			$Email->Host = 'smtp.gmail.com'; // Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
			$Email->Port = '465'; // Porta de envio
			$Email->SMTPSecure = 'ssl';
			$Email->Username = 'itaxiproject@gmail.com'; //e-mail que será autenticado
			$Email->Password = 'itaxi123*'; // senha do email
			// ativa o envio de e-mails em HTML, se false, desativa.
			$Email->IsHTML(true); 
			// email do remetente da mensagem
			$Email->From = $nome;
			// nome do remetente do email
			$Email->FromName = $email;
			// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
			$Email->AddReplyTo($email, $nome);
			$Email->AddAddress("itaxiproject@gmail.com"); // para quem será enviada a mensagem
			// informando no email, o assunto da mensagem
			$Email->Subject = "(Mensagem projeto itaxi)";
			// Define o texto da mensagem (aceita HTML)
			$Email->Body .= "<br /><br />
							 <strong>Nome:</strong> $nome<br /><br />
							 <strong>E-mail:</strong> $email<br /><br />
							 <strong>Assunto:</strong> $assunto<br /><br />
							 <strong>Mensagem:</strong> $message";	
			// verifica se está tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
			if(!$Email->Send()){
				echo "<p>A mensagem não foi enviada. </p>";
				echo "Erro: " . $Email->ErrorInfo;
			}else{
				header('Location:'.BASE_URL.'contactoconfirmacaoPage.php');
			}
			
			
?>
