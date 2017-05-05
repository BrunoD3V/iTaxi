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
    <title>iTáxi - Homepage</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <style>
    body {background-color:black}
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
                <div class="col-xs-3 col-sm-3 col-md-5 col-lg-6" id="logo">
                  <img src="images/logo.png" width="150px" height="100px" alt="Logo iTáxi"/>     
                </div>
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNavBar" aria-expanded="false" id="botaomenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
            </button>
                <div class="col-xs-9 col-sm-9 col-md-7 col-lg-6 collapse navbar-collapse" id="mainNavBar">
                  <ul class="nav navbar-nav nav-right">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="empresaPage.php">Empresa</a></li>
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
     </div>
    </header> 
    <div class="container ">
      <div class="row">
        <div class="col-xs-12 col-md-12 jumbotron">
            <h1>Viaje Connosco</h1>
            <p>Registe-se ou faça login!</p>
            <p><a class="btn btn-danger btn-lg" href="login.html" role="button-primary">Login/Registar</a></p>
         </div>
      </div>
    </div>
<div class="container">
<div class="row" >
  <div class="col-xs-12 col-sm-6 col-md-6">
    <div class="thumbnail" align="center">
      <img src="images/downloads3.png" alt="Download">
      <div class="caption">
        <h3>Download</h3>
        <p>Download da Aplicação iTáxi.</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">Download</a> </p>
      </div>
    </div>
  </div>
 <div class="col-xs-12 col-sm-6 col-md-6">
    <div class="thumbnail" align="center">
      <img src="images/map.png" alt="Maps">
      <div class="caption">
        <h3>Encontre-nos!</h3>
        <p>Estamos por todo o lado.</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">iTáxi!!</a> </p>
      </div>
    </div>
  </div>
</div>
</div>
      
      
      <script src="http://maps.google.se/maps/api/js?sensor=false"></script>
<script>
  (function () {
    var directionsService = new google.maps.DirectionsService(),
      directionsDisplay = new google.maps.DirectionsRenderer(),
      createMap = function (start) {
        var travel = {
            origin : (start.coords)? new google.maps.LatLng(start.lat, start.lng) : start.address,
            destination : "Alexanderplatz, Berlin",
            travelMode : google.maps.DirectionsTravelMode.DRIVING
            // Exchanging DRIVING to WALKING above can prove quite amusing :-)
          },
          mapOptions = {
            zoom: 10,
            // Default view: downtown Stockholm
            center : new google.maps.LatLng(59.3325215, 18.0643818),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };

        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById("map-directions"));
        directionsService.route(travel, function(result, status) {
          if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(result);
          }
        });
      };

      // Check for geolocation support  
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            // Success!
            createMap({
              coords : true,
              lat : position.coords.latitude,
              lng : position.coords.longitude
            });
          }, 
          function () {
            // Gelocation fallback: Defaults to Stockholm, Sweden
            createMap({
              coords : false,
              address : "Sveavägen, Stockholm"
            });
          }
        );
      }
      else {
        // No geolocation fallback: Defaults to Lisbon, Portugal
        createMap({
          coords : false,
          address : "Lisbon, Portugal"
        });
      }
  })();
</script>
<div id="map">
      </div>
  
 




 

 
 
 
 
 
 
 
 
 
 
    <footer>
      <div class="footer">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                    <p><br> copyright &copy; 2015 - iTáxi</p>
                    <p> project developed by: Bruno Ferreira - Henrique Sá - Pedro Belchior</p>
             </div>
    </div>
    </footer>
    </div>
    
     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>