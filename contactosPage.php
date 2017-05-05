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
    <title>iTáxi - Contactos</title>
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
                        <li><a href="empresaPage.php">Empresa</a></li>
                        <li><a href="ondeestamosPage.php">Onde estamos</a></li>
                        <li><a href="tarifasPage.php">Tarifas</a></li>

                        <li class="active"><a href="#">Contactos</a></li>
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
 <!-- Contacts -->
 <div id="contactos">

    <label id="labelContactos"> Contacte-nos:</label> <br>
   	<p id="paragContactos">
    	Email: 	support@itaxi.pt<br>
    	Telefone: 	+035 278 951 153<br>
    	Morada: 	Av. Dr. Belchior Riquinho nº 666<br>
    	Código-Postal: 	5300-153
        
    </p>
</div>
<br>
<br>
<br>

 <div id="contacts">

   <div class="row">	
     <!-- Alignment -->
	<div class="col-sm-offset-3 col-sm-6">
	   <!-- Form itself -->
          <form action="php/envia.php" method="POST" name="sentMessage" class="well" id="contactForm"  novalidate>
          <div id="img">  
               <img src="images/logo.png" class="login" alt="logo">
          </div>
	       <legend>Contacte-nos</legend>
		 <div class="control-group">
                    <div class="controls">
							<input type="text" class="form-control" name="nomeremetente" placeholder="Nome" id="name" required data-validation-required-message="Introduza o seu nome" />
			  				<p class="help-block"></p>
		   			</div>
	     </div> 	
         <div class="control-group">
                  <div class="controls">
							<input type="email" class="form-control" name="emailremetente" placeholder="Email" id="email" required data-validation-required-message="Introduza o seu email" />
				  </div>
	    </div> 	
    <br>
		<div class="control-group">
                  <div class="controls">
							<input type="text" class="form-control" name="assunto" placeholder="Assunto" id="Assunto" required data-validation-required-message="Introduza o assunto" />
				  </div>
	    </div> 	
	<br>
               <div class="control-group">
                 	<div class="controls">
				 			<textarea rows="9" cols="100" name="message" class="form-control" placeholder="Mensagem" id="message" required data-validation-required-message="Introduza a sua mensagem" minlength="5"data-validation-minlength-message="Min 5 characters" maxlength="999" style="resize:none"></textarea>
					</div>
               </div> 		 
	     <div id="success"> </div> <!-- For success/fail messages -->
	    <button type="submit" class="btn btn-primary pull-right">Enviar</button><br />
          </form>
		</div>
      </div>
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