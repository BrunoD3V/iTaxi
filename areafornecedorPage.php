<?php

  session_start();
  include 'php/db_const.php';
  
  	if (!isset($_SESSION['login']) || $_SESSION["login"]==0 || $_SESSION["login"]==1) 
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
    <title>iTáxi - Área de Fornecedor</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="css/style.css">

<!--Funçoes JQuery-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 




<script>


$(document).ready(function() {

    $('#btnDados').click(function(e) {
    $("#formDados").delay(100).fadeIn(100);
    
    $("#formsetpass").fadeOut(100);
    $("#formServicoViatura").fadeOut(100);  
    $("#formadicionamotorista").fadeOut(100); 
    $("#formRemViaturas").fadeOut(100);
    $("#formViaturas").fadeOut(100);
    $("#myAccountFornDiv").fadeOut(100);
    
    $('#btnMyAcc').removeClass('active');
    $('#btnServicosViatura').removeClass('active');
    $('#btnSetPass').removeClass('active');
    $('#btnRemoveViaturas').removeClass('active');
    $('#btnMotoristas').removeClass('active');
    $('#btnViaturas').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#btnViaturas').click(function(e) {
    $("#formViaturas").delay(100).fadeIn(100);
    
    $("#formsetpass").fadeOut(100);
    $("#formServicoViatura").fadeOut(100);  
    $("#formadicionamotorista").fadeOut(100); 
    $("#formRemViaturas").fadeOut(100);
    $("#formDados").fadeOut(100);
    $("#myAccountFornDiv").fadeOut(100);

    
    $('#btnMyAcc').removeClass('active');
    $('#btnServicosViatura').removeClass('active');
    $('#btnSetPass').removeClass('active');
    $('#btnRemoveViaturas').removeClass('active');
    $('#btnDados').removeClass('active');
    $('#btnMotoristas').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

   $('#btnServicosViatura').click(function(e) {
    $("#formServicoViatura").delay(100).fadeIn(100);
    
    $("#formViaturas").fadeOut(100);
    $("#formadicionamotorista").fadeOut(100);  
    $("#formsetpass").fadeOut(100); 
    $("#formRemViaturas").fadeOut(100);
    $("#formDados").fadeOut(100);
    $("#myAccountFornDiv").fadeOut(100);

    $('#btnMyAcc').removeClass('active');
    $('#btnMotoristas').removeClass('active');
    $('#btnSetPass').removeClass('active');
    $('#btnRemoveViaturas').removeClass('active');
    $('#btnDados').removeClass('active');
    $('#btnViaturas').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

   $('#btnRemoveViaturas').click(function(e) {
      $("#formRemViaturas").delay(100).fadeIn(100);
      $("#formDados").fadeOut(100);
      $("#myAccountFornDiv").fadeOut(100);
      $("#formsetpass").fadeOut(100);
      $("#formViaturas").fadeOut(100);
      $("#formServicoViatura").fadeOut(100);  
      $("#formadicionamotorista").fadeOut(100); 

      $('#btnMyAcc').removeClass('active');
      $('#btnDados').removeClass('active');
      $('#btnViaturas').removeClass('active');
      $('#btnMotoristas').removeClass('active');
      $('#btnServicosViatura').removeClass('active');
      $('#btnSetPass').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });

     $('#btnMyAcc').click(function(e) {
      //Janela a Aparecer
      $("#myAccountFornDiv").delay(100).fadeIn(100);
      //Janelas a Desaparecer
      $("#formDados").fadeOut(100);
      $("#formsetpass").fadeOut(100);
      $("#formViaturas").fadeOut(100);

      $("#formRemViaturas").fadeOut(100);
      $("#formServicoViatura").fadeOut(100);  
      $("#formadicionamotorista").fadeOut(100);    

      //Botoes a Desativar
      $('#btnDados').removeClass('active');
      $('#btnViaturas').removeClass('active');
      $('#btnRemoveViaturas').removeClass('active');
      $('#btnMotoristas').removeClass('active');
      $('#btnServicosViatura').removeClass('active');
      $('#btnSetPass').removeClass('active');
      //Botao a Ativar
      $(this).addClass('active');
      e.preventDefault();
    });

     $('#btnMotoristas').click(function(e) {
      //Janela a Aparecer
      $("#formadicionamotorista").delay(100).fadeIn(100);
      //Janelas a Desaparecer
      $("#formDados").fadeOut(100);
      $("#formsetpass").fadeOut(100);
      $("#formViaturas").fadeOut(100);

      $("#formRemViaturas").fadeOut(100);
      $("#myAccountFornDiv").fadeOut(100);  
      $("#formServicoViatura").fadeOut(100);    

      //Botoes a Desativar
      $('#btnDados').removeClass('active');
      $('#btnViaturas').removeClass('active');
      $('#btnRemoveViaturas').removeClass('active');
      $('#btnSetPass').removeClass('active');
      $('#btnMyAcc').removeClass('active');
      $('#btnMudarPass').removeClass('active');
      //Botao a Ativar
      $(this).addClass('active');
      e.preventDefault();
    });


     $('#btnSetPass').click(function(e) {
      //Janela a Aparecer
      $("#formsetpass").delay(100).fadeIn(100);
      //Janelas a Desaparecer
      $("#formDados").fadeOut(100);
      $("#formadicionamotorista").fadeOut(100);
      $("#formViaturas").fadeOut(100);

      $("#formRemViaturas").fadeOut(100);
      $("#formServicoViatura").fadeOut(100);  
      $("#myAccountFornDiv").fadeOut(100);    

      //Botoes a Desativar
      $('#btnDados').removeClass('active');
      $('#btnViaturas').removeClass('active');
      $('#btnRemoveViaturas').removeClass('active');
      $('#btnMotoristas').removeClass('active');
      $('#btnServicosViatura').removeClass('active');
      $('#btnMyAcc').removeClass('active');
      //Botao a Ativar
      $(this).addClass('active');
      e.preventDefault();
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
                        <li><a href="contactosPage.php">Contactos</a></li>
						<?php if (isset($_SESSION['login']) && $_SESSION["login"]==2)  {  ?>
																								
										<li><a class="active" href="areafornecedorPage.php" >Área Fornecedor</a></li>
										<li><a href="php/logout.php" >Logout</a></li>
									
									
						<?php } else {?>
										<li><a href="loginPage.php" title="">Login</a></li>
						<?php }  ?>
                       
  					</ul>
                 </div>
             </div>
            </div>
         </div>


    </header> 



<div class="container-fluid">
  <div class="row">
    <div class="col-md-2" id="menuFornecedor">
	  <p>Bem vindo(a) <?php echo $_SESSION['nome']; ?></p>
      <ul class="nav nav-pills nav-stacked nav-pills-colors">
        <li class="active"><a>Área de Fornecedor</a></li>
        <li><a href="#" id="btnMyAcc">A Minha Conta</a></li>
        <li><a href="#" id="btnDados">Atualizar Dados</a></li>
        <li><a href="#" id="btnSetPass">Mudar password</a></li>
        <li class="active"><a>Viaturas e Motoristas</a></li>
        <li><a href="#" id="btnViaturas">Adicionar Viaturas</a></li>
        <li><a href="#" id="btnRemoveViaturas">Remover Viaturas</a></li>
        <li><a href="#" id="btnMotoristas">Adicionar Motoristas</a></li>
        <li class="active"><a>Serviços e Consultas</a></li>
        <li><a href="#" id="btnServicosViatura">Serviços Viatura</a></li>
        
        
 
       
    
     
      </ul>
    </div>
    <div class="col-md-10">
      <div class="alert-placeholder"></div>
        <div class="panel panel-danger">
          <div class="panel-body ">
            <div id="img">
              <img src="images/logo.png" alt="logotipo da itaxi" class="login" height="70">
            </div>

<!-- A minha conta-->
   <div class="row">  
  <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
    <!-- Table -->
<div class="table-responsive" id="myAccountFornDiv" style="display: block;">

  

<?php


$nome=0;
$morada=0;
$nif=0;
$iban=0;
$telemovel=0;
$email=0;




class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

if (!isset($_SESSION['login']) || $_SESSION["login"]==0) 
{
  header('Location:'.BASE_URL.'loginPage.php');
}



try {
    $handler = new PDO(DB_HOST,DB_USER, DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}


$username=$_SESSION['username'];


  $sthandler = $handler->prepare("SELECT * FROM fornecedores WHERE username = :nome");
  $sthandler->bindParam(':nome', $username);
  $sthandler->execute();
  $result = $sthandler->fetchAll();

  
        foreach($result as $row)
    {
 
  $nome = $row['nome'];
  $morada = $row['morada'];
  $nif = $row['nif'];
  $iban = $row['iban'];
  $telefone = $row['telefone'];
  $email = $row['email'];
}



?>

<table class="table">
<tbody>
    <tr>
      <th scope="row">Nome: </th>
      <td><?php echo $nome; ?></td>
    </tr>
    <tr>
      <th scope="row">Morada: </th>
      <td><?php echo $morada; ?></td>
    </tr>
    <tr>
      <th scope="row">NIF: </th>
      <td><?php echo $nif; ?></td>
    </tr>
    <tr>
      <th scope="row">IBAN: </th>
      <td><?php echo $iban; ?></td>
    </tr>
    <tr>
      <th scope="row">Telefone: </th>
      <td><?php echo $telefone; ?></td>
    </tr>
    <tr>
      <th scope="row">Email: </th>
      <td><?php echo $email; ?></td>
    </tr>
  </tbody>
</table>


</div>
    </div>
  </div>






  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <form id="formDados" action="php/atualizaDadosFornecedor.php" method="post" style="display: none;">
        <h1 class="h1centro">Actualizar Dados</h1>
        <div class="form-group">
          <label for='nome'>Nome </label>
          <input type="text" name="nome" id="nome" tabindex="1" class="form-control" placeholder="Nome" value="">
        </div>
        <div class="form-group">
          <label for='morada'>Morada </label>
          <input type="text" name="morada" id="morada" tabindex="2" class="form-control" placeholder="Morada" value="">
        </div>
        <div class="form-group">
          <label for='nif'>NIF </label>
          <input type="text" name="nif" id="nif" tabindex="3" class="form-control" placeholder="NIF" value="">
        </div>
        <div class="form-group">
          <label for='iban'>IBAN </label>
          <input type="text" name="iban" id="iban" tabindex="4" class="form-control" placeholder="IBAN" value="">
        </div>
        <div class="form-group">
          <label for='telefone'>Telefone </label>
          <input type="text" name="telefone" id="telefone" tabindex="5" class="form-control" placeholder="Telefone" value="">
        </div>
        <div class="form-group">
          <label for='email'>Email </label>
          <input type="email" name="email" id="email" tabindex="6" class="form-control" placeholder="Email" value="">
        </div>
    
      <div class="form-group">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
            <input type="submit" name="btnAtualizar" id="btnAtualizar" tabindex="7" class="form-control btn btn-primary" value="Atualizar" />
          </div>
          </div>
      </div>
      </form>
    </div>
  </div>

<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <form id="formsetpass" action="php/mudaPassFornecedor.php" method="post" autocomplete="off" style="display: none;">
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
              <input type="submit" name="btnSetPass" id="btnSetPass1" tabindex="4" class="form-control btn btn-primary" value="Alterar password" />
            </div>
          </div>
          </div>
      </form>              
    </div>
  </div>





  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <form id="formViaturas" action="php/adicionaViatura.php" method="post" autocomplete="off" style="display: none;">
        <h1 class="h1centro">Adicionar Viatura</h1>
        <div class="form-group">
            <label for='matricula'>Matricula</label>
            <input type="text" name="matricula" id="matricula" tabindex="1" class="form-control" placeholder="Insira a Matricula da Viatura" value="">
          </div>
          <div class="form-group">
            <label for='modelo'>Modelo</label>
            <input type="text" name="modelo" id="modelo" tabindex="2" class="form-control" placeholder="Insira o Modelo da Viatura" value="">
          </div>
          <div class="form-group">
            <label for='marca'>Marca</label>
            <input type="text" name="marca" id="marca" tabindex="3" class="form-control" placeholder="Insira a Marca da Viatura" value="">
          </div>
          <div class="form-group">
            <label for='ano'>Ano</label>
            <input type="text" name="ano" id="ano" tabindex="4" class="form-control" placeholder="Insira o ano da Viatura" value="">
          </div>
          <div class="form-group">
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
              <input type="submit" name="btnInsertViatura" id="btnInsertViatura" tabindex="5" class="form-control btn btn-primary" value="Inserir Viatura" />
            </div>
          </div>
          </div>
      </form>
                
    </div>
  </div>

 <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <form id="formadicionamotorista" action="php/adicionaMotorista.php" method="post" autocomplete="off" style="display: none;">
         <h1 class="h1centro">Adicionar Motorista</h1>
        <div class="form-group">
            <label for='nomemotorista'>Nome do Motorista</label>
            <input type="text" name="nomemotorista" id="nomemotorista" tabindex="1" class="form-control" placeholder="Insira o Nome do Motorista" value="">
          </div>
          <div class="form-group">
            <label for='morada'>Morada do Motorista</label>
            <input type="text" name="morada" id="moradamotorista" tabindex="2" class="form-control" placeholder="Insira a Morada" value="">
          </div>
          <div class="form-group">
            <label for='telemovel'>Telemovel do Motorista</label>
            <input type="text" name="telemovel" id="telemovel" tabindex="3" class="form-control" placeholder="Insira o Telemovel" value="">
          </div>
          <div class="form-group">
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
              <input type="submit" name="btnInsertMotorista" id="btnInsertMotorista" tabindex="4" class="form-control btn btn-primary" value="Inserir Motorista" />
            </div>
          </div>
          </div>
      </form>
  </div>
</div>


 <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <form id="formRemViaturas" action="php/removeViatura.php" method="post" autocomplete="off" style="display: none;">
        <h1 class="h1centro">Remover Viatura</h1>
        <div class="form-group">
            <label for='matricula'>Matricula</label>
            <input type="text" name="matricula" id="matricularemove" tabindex="1" class="form-control" placeholder="Insira a Matricula" value="">
          </div>
          <div class="form-group">
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
              <input type="submit" name="btnRemoveViatura" id="btnRemoveViatura" tabindex="5" class="form-control btn btn-primary" value="Remover Viatura" />
            </div>
          </div>
          </div>
      </form> 
    </div>
  </div>



  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">

    <form id="formServicoViatura" action="php/servicoViatura.php" method="post" target="consultaServico" style="display: none;">
        <h1 class="h1centro">Serviços da Viatura</h1>
         <div class="form-group">
            <label for='matricula'>Matricula da Viatura</label>
            <input type="text" name="matricula" id="matriculaconsulta" tabindex="1" class="form-control" placeholder="Insira a Matricula da Viatura" value="">
          </div>
          <div class="form-group">
          <div class="row">
          <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
              <input type="submit" name="btnConsultaViatura" id="btnConsultaViatura" tabindex="2" class="form-control btn btn-primary" value="Consultar" />
            </div>
          </div>
          </div>

          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item"  name="consultaServico"></iframe>
          </div>

    </form>
    

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
                
                    <p><br> copyright &copy; 2015 - iTáxi</p>
                    <p> project developed by: Bruno Ferreira - Henrique Sá - Pedro Belchior</p>
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