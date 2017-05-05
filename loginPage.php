<?php

  session_start();
  
  include 'php/db_const.php';
  	if (isset($_SESSION['login']) && $_SESSION["login"]==1) 
	{
		header('Location:'.BASE_URL.'jaLogouPage.php');
	}
  if(isset($_COOKIE['uName']))
  {
  	header('Location:'.BASE_URL.'php/login.php');
  }
?>
  
<!DOCTYPE html>

<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Bruno Ferreira, Henrique Sá e Pedro Belchior">
	<meta name="description" content="Plataforma para pedidos de taxi na zona de Mirandela">
	<meta name="keywords" content="itaxi, taxi mirandela, taxi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>iTáxi - Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style-sign.css"> 
	<link rel="stylesheet" href="css/style.css">
    <style>

	</style>    

	<!--JQUERY-->
	<!--JQUERY INCLUDES-->
	
	<script type="text/javascript" src="jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <!--JQUERY FUNÇOES-->
<script>

 $(document).ready(function() {
	  $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$("#login-fornecedor-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$('#login-fornecedor-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#login-fornecedor-form-link').click(function(e) {
		$("#login-fornecedor-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	  
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$("#login-fornecedor-form").fadeOut(100);
		$('#login-fornecedor-form-link').removeClass('active');
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

$('#nome').on('input', function() {
	var input=$(this);
	var is_name=input.val();
	if(is_name){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});

$('#email').on('input', function() {
	var input=$(this);
	var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var is_email=re.test(input.val());
	if(is_email){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});

$('#password').on('input', function() {
	var input=$(this);
	var is_name=input.val();
	if(is_name){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});

$('#confirme-password').on('input', function() {
	var input=$(this);
	var is_name=input.val();
	if(is_name){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});

$('#morada').on('input', function() {
	var input=$(this);
	var is_name=input.val();
	if(is_name){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});

$('#nif').on('input', function() {
	var input=$(this);
	var is_name=input.val();
	if(is_name){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});

$('#telemovel').on('input', function() {
	var input=$(this);
	var is_name=input.val();
	if(is_name){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});
});//FIM FUNCTION

function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#confpassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords nao coincidem!");
    else 
        $("#divCheckPasswordMatch").html("Passwords coincidem.");
}

$(document).ready(function () {
   $("#confpassword").keyup(checkPasswordMatch);
});

function checkPasswordLength() {
	var password = $("#txtNewPassword").val();

	if(password.length<8)
		$("#divCheckPasswordLength").html("Password demasiado curta.");
	else
		$("#divCheckPasswordLength").html("Password Forte!");
}
$(document).ready(function () {
   $("#txtNewPassword").keyup(checkPasswordLength);
});

</script>




</head>
<body>





    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> 
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
  </head>
  <body>
  
  
  
  <!--MAIN MENU!!1-->
  <header>
    <div class = "nav navbar-inverse navbar-static-top">
    	<div class = "container-fluid">
        	<div class="header">
                <div class="col-xs-1 col-sm-3 col-md-2 col-lg-2" id="logo">
                	<img src="images/logo.png" width="150" height="100" alt="Logo iTáxi"/>     
                </div>
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNavBar" aria-expanded="false" id="botaomenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
      			</button>
                <div class="col-xs-11 col-sm-9 col-md-7 col-lg-6 collapse navbar-collapse" id="mainNavBar">
                	<ul class="nav navbar-nav nav-right">
                        <li><a href="indexPage.php">Home</a></li>
                        <li><a href="empresaPage.php">Empresa</a></li>
                        <li><a href="ondeestamosPage.php">Onde estamos</a></li>
                        <li><a href="tarifasPage.php">Tarifas</a></li>
                        <li><a href="contactosPage.php">Contactos</a></li>
						<li class="active"><a href="#">Login</a></li>
                    
  					</ul>
                 </div>
             </div>
            </div>
         </div>
     </div>
    </header> 


	<!--REGISTAR-->
    
  <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-4 col-sm-4 col-md-4">
								<a href="#" class="active" id="login-form-link">Login Cliente</a>
							</div> 
							<div class="col-xs-4 col-sm-4 col-md-4">
								<a href="#" id="login-fornecedor-form-link">Login Fornecedor</a>
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4">
								<a href="#" id="register-form-link">Registar Cliente</a>
							</div>
                           
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
                        	<div id="img" align="center">  
                            <img src="images/logo.png" class="login" height="70">
                            </div>
							<div class="col-xs-12 col-lg-12">
                            <!--Formulario Login-->
								<form id="login-form" action="php/login.php" method="post" role="form" style="display: block;">
									<div class="form-group">
									<?php if(isset($_SESSION['login']) && $_SESSION['login']==0) {?>
									<div id="ErrorMsg">
										<p id="errorParagraph">Dados Incorretos, Por favor faça o login de novo.</p>
									</div>
									<?php } ?>
									
										<label for="username">Username:</label>
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<label for="password">Password:</label>
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div align="center" class"form-group">
									<input type="checkbox"  name="remember" /><p>Manter Logado.</p>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<div id="recaptcha1"></div>
												<input type="submit" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-login btn-block" value="Log In">
											</div>

										</div>
										<div align="center">
										<a href="resetpassPage.php" >Esqueceu a sua password?</a>
										</div> 
									</div>
								
								</form>
                                
                                <!--Login Fornecedor-->
                                <form id="login-fornecedor-form" action="php/loginFornecedor.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<label for="username">Username:</label>
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
									</div>
								
                                    <div class="form-group">
										<label for="password">Password:</label>
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											<div id="recaptcha2"></div>
												<input type="submit" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
										<div align="center">
										<a href="resetpassPage.php" >Esqueceu a sua password?</a>
										</div> 
									</div>
								
								</form>
                                
                                <!--Formulario Registo-->
								<form id="register-form" action="php/register.php" method="post" role="form" style="display: none;">
									 <div class="form-group">
									 	<label for="username">Username:</label>
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Escolha um Username" value="" required>
									</div>
									 <div class="form-group">
									 	<label for="nome">Nome:</label>
										<input type="text" name="nome" id="nome" tabindex="1" class="form-control" placeholder="Insira o seu Nome" value="" required>
									</div>
                                    <div class="form-group">
                                    	<label for="email">Email:</label>
										<input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Endereço de Email" value="" required>
									</div>
									<div class="form-group">
										<label for="password">Password:</label>
										<input type="password" name="password" id="txtNewPassword" tabindex="3" class="form-control" placeholder="Password" required>
										<div class="registrationFormAlert" id="divCheckPasswordLength" ></div>
									</div>
									<div class="form-group">
										<label for="confpassword">Confirme Password:</label>
										<input type="password" name="confpassword" id="confpassword" onChange="checkPasswordMatch();" tabindex="4" class="form-control" placeholder="Confirme Password" required>
										<div class="registrationFormAlert" id="divCheckPasswordMatch" ></div>
										<span id="confirmMessage" class="confirm-password"></span>
									</div>
                                    <div class="form-group">
                                    	<label for="morada">Morada:</label>
										<input type="text" name="morada" id="morada" tabindex="5" class="form-control" placeholder="Insira a sua morada" value="" required>
									</div>
                                     <div class="form-group">
                                     	<label for="nif">NIF:</label>
										<input type="text" name="nif" id="nif" tabindex="6" class="form-control" placeholder="Insira o seu NIF" value="" required>
									</div>
                                    <div class="form-group">
                                    	<label for="telemovel">Contacto Telemóvel:</label>
										<input type="text" name="telemovel" id="telemovel" tabindex="7" class="form-control" placeholder="Insira Numero de Telemovel" value="" required>
									</div>
									 <div class="form-group">
                                    	<label for="pais">País:</label>
										<input type="text" name="pais" id="pais" tabindex="8" class="form-control" placeholder="Insira o seu País" value="" required>
									</div>
									<div class="registrationFormAlert" id="divCheckPasswordMatch" ></div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											<div id="recaptcha3"></div>
												<input type="submit" name="submit" id="register-submit" tabindex="9" class="form-control btn btn-register" value="Registar Agora">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  
  
  
 
    <!--FOOTER-->
    <footer>
     	<div class="footer">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                    <p><br> copyright &copy; 2015 - iTáxi</p>
                    <p> project developed by: Bruno Ferreira - Henrique Sá - Pedro Belchior</p>
             </div>
		</div>
    </footer>

    
     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>