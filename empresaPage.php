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
    <title>iTáxi - Empresa</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
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
                	<img src="images/logo.png" width="150" height="100" alt="Logo iTáxi"/>     
                </div>
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=		"#mainNavBar" aria-expanded="false" id="botaomenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
      			</button>
                <div class="col-xs-9 col-sm-9 col-md-7 col-lg-6 collapse navbar-collapse" id="mainNavBar">
                	<ul class="nav navbar-nav nav-right">
                        <li><a href="indexPage.php">Home</a></li>
                        <li class="active"><a href="#">Empresa</a></li>
                        <li><a href="ondeestamosPage.php">Onde estamos</a></li>
                        <li><a href="tarifasPage.php">Tarifas</a></li>
                        <li><a href="contactosPage.php">Contactos</a></li>
                        <?php if (isset($_SESSION['login']) && ($_SESSION["login"]==2 || $_SESSION["login"]==1)  ) {  ?>
							
									<?php if ($_SESSION["login"]==1) { ?>
										<li><a href="areaclientePage.php" title="">Área Cliente</a></li>
										<li><a href="php/logout.php" title="">Logout</a></li>
									
									<?php } else if ($_SESSION["login"]==2) { ?>
										<li><a href="areafornecedorPage.php" title="">Área Fornecedor</a></li>
										<li><a href="php/logout.php" title="">Logout</a></li>
									<?php } ?>
									
						<?php } else {?>
							<li><a href="loginPage.php" title="">Login</a></li>
						<?php }  ?>
  					</ul>
                 </div>
             </div>
            </div>
         </div>
 
    </header> 
    
    <article>
  <div class="article">
    <div class="empresa">
        <div role="main" class="col-md-6">
            <img src="images/empresa.jpg" class="img-responsive" alt="empresa" id="imageempresa"/>
        </div>
        <aside role="complementary" class="col-md-6">
        <div id="txtempresa">
            <h3> A iTáxi é suportada por alta tecnologia em todas as fases de um pedido de táxi, desenvolvida pelo Bruno Ferreira, Henrique Sá e Pedro Belchior, no ambito da unidade curricular de Desenvolvimento Web II. Muitas chamadas podem ser atendidas directamente pelo nosso website, com a qual pode interagir através do teclado do seu telefone. Em função da localização de cada carro, que é conhecida a todo o instante graças aos dispositivos GPS/GPRS que equipam a frota, há um programa informático que calcula em tempo-real qual o carro que mais rapidamente serve cada cliente, enviando electrónicamente o seu pedido para esse táxi.

Em 90% dos nossos serviços, os passageiros são recolhidos em menos de 5 minutos. Somos imbatíveis na eficiência com que chegamos à sua porta. Proporcionamos-lhe ainda diversas formas de chamar um táxi, desde a convencional chamada de voz para a nossa operadora robot ou para as suas colegas humanas, até à app iTáxi, disponível para iOS e Android, que lhe permite chamar um táxi com poucos toques no seu smartphone ou tablet. </h3>
</div>
        </aside>
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
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>