<?php

  session_start();

  include 'php/db_const.php';
     
     if (!isset($_SESSION['login']) || $_SESSION["login"]==0 || $_SESSION["login"]==2 ) 
      	{
      		header('Location:'.BASE_URL.'paginaRestritaPage.php');
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
    <title>iTáxi - Área de Cliente</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">

<!--Funçoes JQuery-->
<script>
function deleteCookie(name)
{
  document.cookie=name+'=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname+"="+cvalue+"; "+expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
        document.getElementById("dataLogin").innerHTML = user;
        deleteCookie("username");
        user = new Date();
        setCookie("username", user, 30);
    } else {
       user = new Date();
       if (user != "" && user != null) {
           setCookie("username", user, 30);
       }
    }
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>

  $(document).ready(function() {
  

    $.ajax({
          type: "POST",
          url: "php/mostraregistocliente.php",
          data:"",
          success: function(html){
            $("#myAccountDiv").html(html);
          }
        });

    $.ajax({
          type: "POST",
          url: "php/consultaHistorico.php",
          data:"",
          success: function(html){
            $("#divHistorico").html(html);
          }
        });


    $('#btndados').click(function(e) {
    $("#atdados").delay(100).fadeIn(100);
    $("#myAccountDiv").fadeOut(100);
    $("#formsetpass").fadeOut(100);
    $("#navigationDiv").fadeOut(100);
    $("#divHistorico").fadeOut(100);
    $('#btnHist').removeClass('active');
    $('#btntaxi').removeClass('active');
    $('#btnsetpass').removeClass('active');
    $('#btnconta').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  
  $('#btnsetpass').click(function(e) {
    $("#formsetpass").delay(100).fadeIn(100);
    $("#atdados").fadeOut(100);
    $("#myAccountDiv").fadeOut(100);
    $("#navigationDiv").fadeOut(100);
    $("#divHistorico").fadeOut(100);
    $('#btnHist').removeClass('active');
    $('#btntaxi').removeClass('active');
    $('#btnconta').removeClass('active');
    $('#btndados').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

  $('#btnconta').click(function(e) {
    $("#myAccountDiv").delay(100).fadeIn(100);
    $("#formsetpass").fadeOut(100);
    $("#atdados").fadeOut(100);
    $("#navigationDiv").fadeOut(100);
    $("#divHistorico").fadeOut(100);
    $('#btnHist').removeClass('active');
    $('#btntaxi').removeClass('active');
    $('#btnsetpass').removeClass('active');
    $('#btndados').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

  $('#btntaxi').click(function(e) {
    $("#navigationDiv").delay(100).fadeIn(100);
    $("#myAccountDiv").fadeOut(100);
    $("#atdados").fadeOut(100);
    $("#formsetpass").fadeOut(100);
    $("#divHistorico").fadeOut(100);
    $('#btnHist').removeClass('active');
    $('#btnconta').removeClass('active');
    $('#btnsetpass').removeClass('active');
    $('#btndados').removeClass('active');
    $(this).addClass('active');
  });


  $('#btnHist').click(function(e) {
    $("#divHistorico").delay(100).fadeIn(100);
    $("#navigationDiv").fadeOut(100);
    $("#myAccountDiv").fadeOut(100);
    $("#atdados").fadeOut(100);
    $("#formsetpass").fadeOut(100);
    $('#btntaxi').removeClass('active');
    $('#btnconta').removeClass('active');
    $('#btnsetpass').removeClass('active');
    $('#btndados').removeClass('active');
    $(this).addClass('active');
  });
function checkPasswordMatch() {
    var password = $("#inputNewPass").val();
    var confirmPassword = $("#inputNewPassConfirm").val();

    if (password != confirmPassword)
        $("#DivNovaPassCoincide").html("Passwords nao coincidem!");
    else 
        $("#DivNovaPassCoincide").html("Passwords coincidem.");
}

$(document).ready(function () {
   $("#inputNewPassConfirm").keyup(checkPasswordMatch);
});

function checkPasswordLength() {
  var password = $("#inputNewPass").val();

  if(password.length<8)
    $("#DivNovaPassCurta").html("Password demasiado curta.");
  else
    $("#DivNovaPassCurta").html("Password Forte!");
}
$(document).ready(function () {
   $("#inputNewPass").keyup(checkPasswordLength);
});

 
  }); 
</script>

    <style>

	</style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="checkCookie()">
  
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
                        <li><a href="contactosPage.php">Contactos</a></li>
                        <?php if (isset($_SESSION['login']) && $_SESSION["login"]==1) {?>  
										<li><a class="active" href="areaclientePage.php" title="">Área Cliente</a></li>
										<li><a href="php/logout.php" title="">Logout</a></li>
											
						<?php	} else {?>
							<li><a href="loginPage.php" title="">Login</a></li>
						<?php }  ?>
                       
  					</ul>
                 </div>
             </div>
            </div>
         </div>
   
    </header> 
    <div class="container-fluid" >
	<div class="row">
		<div class="col-md-2" id="menucliente">
		<p id="bemvindo">Bem vindo(a)<?php echo $_SESSION['nome']; ?></p>
			<ul class="nav nav-pills nav-stacked nav-pills-colors">
				<li class="active"><a>Área de Cliente</a></li>
				<li><a href="#" id="btnconta">A minha conta</a></li>
				<li><a href="#" id="btndados">Atualizar dados</a></li>
				<li><a href="#" id="btnsetpass">Mudar password</a></li>
				
				<li class="active"><a>Serviços</a></li>
				<li><a href="chamarTaxi.php" id="btntaxi">Chamar táxi</a></li>
				<li><a href="#" id="btnHist">Consultar Histórico</a></li>
        		<li><a href="faturapdf.php" id="btnFatura">Emitir Fatura Digital</a></li>
			</ul>
		</div>
		
		<div class="col-md-10">
      <div class="alert-placeholder"></div>
        <div class="panel panel-danger">
        <div class="panel-body ">
            <div id="img2">
              <img src="images/logo.png"  alt = "logo da itaxi" class="login" height="70">
            </div>

  <!-- A minha conta-->
   <div class="row">  
  <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
    <!-- Table -->
<div class="table-responsive" id="myAccountDiv" style="display: block;"> </div>


    </div>
  </div>


  <!-- Atualizar dados-->
  <div class="row">  
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <form id="atdados" action="php/atualizaDadosCliente.php" method="post" style="display: none;">
        <h1 class="h1centro">Actualizar Dados</h1>
        <div class="form-group">
          <label for='nome'>Nome:</label>
          <input type="text" name="nome" id="nome" tabindex="1" class="form-control" placeholder="Nome" value="">
        </div>
		<div class="form-group">
          <label for='morada'>Morada:</label>
          <input type="text" name="morada" id="morada" tabindex="1" class="form-control" placeholder="Morada" value="">
        </div>
        <div class="form-group">
          <label for='nif'>NIF:</label>
          <input type="text" name="nif" id="nif" tabindex="2" class="form-control" placeholder="NIF" value="">
        </div>
        <div class="form-group">
          <label for='telemovel'>Telemovel:</label>
          <input type="text" name="telemovel" id="telemovel" tabindex="3" class="form-control" placeholder="Telemovel" value="">
        </div>
		 <div class="form-group">
          <label for='email'>Email:</label>
          <input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email" value="">
        </div>
    
      <div class="form-group">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
            <input type="submit" name="btnAtualizar" id="btnAtualizar" tabindex="4" class="form-control btn btn-primary" value="Atualizar" />
          </div>
          </div>
      </div>

     
      </form>
    </div>
  </div>
	<!-- Atualizar password-->
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <form id="formsetpass" action="php/mudaPass.php" method="post" autocomplete="off" style="display: none;">
        <h1 class="h1centro">Mudar password</h1>
          <div class="form-group">
            <label for='passantiga'>Password antiga:</label>
            <input type="password" name="passantiga" id="passantiga" tabindex="1" class="form-control" placeholder="Password antiga" value="">
          </div>
          <div class="form-group">
            <label for='novapass'>Nova password:</label>
            <input type="password" name="novapass" id="novapass" tabindex="2" class="form-control" placeholder="Nova password" value="" />
            <div id="DivNovaPassCurta"></div>
          </div>
          <div class="form-group">
            <label for='reppass'>Repetir nova password:</label>
            <input type="password" name="reppass" id="reppass" tabindex="3" class="form-control" placeholder="Repetir nova password" value="" />
            <div id="DivNovaPassCoincide"></div>
          </div>
          <div class="form-group">
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
              <input type="submit" name="btnSetPass" id="btnSetPass" tabindex="4" class="form-control btn btn-primary" value="Alterar password" />
            </div>
          </div>
          </div>
      </form>              
    </div>
  </div>
<!--Pedido taxi-->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
		  <div id="navigationDiv" style="display: none">

        

        <p id="pid1">Voce encontra-se aqui:</p>
        <div id="map"></div>
        <section id="sectionid1"></section>
        <div>
          

        </div>
        <form id="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="EET4HA8S7S3HL">
        <input type="image" src="https://www.paypalobjects.com/pt_PT/PT/i/btn/btn_buynowCC_LG.gif" name="submit" alt="PayPal - A forma mais fácil e segura de efetuar pagamentos online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
      </div>
      </div>
      </div>
      </div>







 <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <div id="divHistorico" style="display: none">

      </div>
    </div>
  </div>




	
  
</div>            
</div>
</div>
</div>

			
		
 <!--Footer geral-->
    <footer>
    
     	<div class="footer" style="static">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="footerdiv">
                      <h4>Data da ultima conexão: </h4>
                    <div id="dataLogin"></div>
                    <p><br> copyright &copy; 2015 - iTáxi</p>
                    <p> project developed by: Bruno Ferreira - Henrique Sá - Pedro Belchior</p>
                    
    </div>
             </div>
		</div>
    </footer>
    
    
     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
       <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>