<?php

  session_start();
  
  

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
    <title>iTáxi - Já logado</title>
    <!-- Bootstrap -->
    <link href="itaxiproject/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="itaxiproject/css/style.css">
    <style>

	</style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header>
    <div class = "nav navbar-inverse navbar-static-top">
    	<div class = "container-fluid">
        	<div class="header">
                <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2" id="logo">
                	<img src="itaxiproject/images/logo.png" width="150" height="100" alt="Logo iTáxi"/>     
                </div>
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=		"#mainNavBar" aria-expanded="false" id="botaomenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
      			</button>
                <div class="col-xs-9 col-sm-9 col-md-7 col-lg-6 collapse navbar-collapse" id="mainNavBar">
                	<ul class="nav navbar-nav nav-right">
                        <li><a href="itaxiproject/indexPage.php">Home</a></li>
                        <li><a href="itaxiproject/empresaPage.php">Empresa</a></li>
                        <li><a href="itaxiproject/ondeestamosPage.php">Onde estamos</a></li>
                        <li><a href="itaxiproject/tarifasPage.php">Tarifas</a></li>
                        <li><a href="itaxiproject/contactosPage.php">Contactos</a></li>
                        <?php if (isset($_SESSION['login']) && ($_SESSION["login"]==2 || $_SESSION["login"]==1)  ) {  ?>
							
									<?php if ($_SESSION["login"]==1) { ?>
										<li><a class="active" href="itaxiproject/areaclientePage.php" title="">Área Cliente</a></li>
										<li><a href="itaxiproject/php/logout.php" title="">Logout</a></li>
									
									<?php } else if ($_SESSION["login"]==2) { ?>
										<li><a href="itaxiproject/areafornecedorPage.php" title="">Área Fornecedor</a></li>
										<li><a href="itaxiproject/php/logout.php" title="">Logout</a></li>
									<?php } ?>
									
						<?php } else {?>
							<li><a href="itaxiproject/loginPage.php" title="">Login</a></li>
						<?php }  ?>
						
  					</ul>
                 </div>
             </div>
            </div>
         </div>
 
    </header> 
    
    <article>
	
	
  	<div id="logado">
        <h2>Você já está logado.</h2>
		<br>
		<br>
		<img src="itaxiproject/images/itaxi-logo.jpg" alt="logo">
    </div>
    </article>
    
    
 
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
    <script src="itaxiproject/js/bootstrap.min.js"></script>
  </body>
</html>