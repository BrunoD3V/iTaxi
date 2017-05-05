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
    <title>iTáxi - Àrea restrita</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <style>

	</style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="getLocation()">
  <header>
    <div class = "nav navbar-inverse navbar-static-top">
    	<div class = "container-fluid">
        	<div class="header">
                <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2" id="logo">
                	<img src="images/logo.png" width="150px" height="100px" alt="Logo iTáxi"/>     
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
                        <?php if (isset($_SESSION['login']) && ($_SESSION["login"]==2 || $_SESSION["login"]==1)  ) {  ?>
							
									<?php if ($_SESSION["login"]==1) { ?>
										<li><a class="active" href="areaclientePage.php" title="">Área Cliente</a></li>
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
	
 <div class="container" id="mapalhao">

 <div id="letrasmap">
 <script>
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
  else{x.innerHTML="Geolocalização não é suportada neste browser.";}
  }
 
function showPosition(position)
  {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='250px';
  mapholder.style.width='500px';
 
  var myOptions={
  center:latlon,zoom:17,
  mapTypeId:google.maps.MapTypeId.SATELLITE,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"Sua localização!"});
  }
  
  function randomGeo(center, radius) {
    var y0 = center.latitude;
    var x0 = center.longitude;
    var rd = radius / 111300; //about 111300 meters in one degree

    var u = Math.random();
    var v = Math.random();

    var w = rd * Math.sqrt(u);
    var t = 2 * Math.PI * v;
    var x = w * Math.cos(t);
    var y = w * Math.sin(t);

    //Adjust the x-coordinate for the shrinking of the east-west distances
    var xp = x / Math.cos(y0);

    var newlat = y + y0;
    var newlon = x + x0;
    var newlon2 = xp + x0;

    return {
        'latitude': newlat.toFixed(5),
        'longitude': newlon.toFixed(5),
        'longitude2': newlon2.toFixed(5),
        'distance': distance(center.latitude, center.longitude, newlat, newlon).toFixed(2),
        'distance2': distance(center.latitude, center.longitude, newlat, newlon2).toFixed(2),
    };
}

function distance(lat1, lon1, lat2, lon2) {
    var R = 6371000;
    var a = 0.5 - Math.cos((lat2 - lat1) * Math.PI / 180) / 2 + Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * (1 - Math.cos((lon2 - lon1) * Math.PI / 180)) / 2;
    return R * 2 * Math.asin(Math.sqrt(a));
}

function generateMapPoints(centerpoint, distance, amount) {
    var mappoints = [];

    for (var i=0; i<amount; i++) {
        mappoints.push(randomGeo(centerpoint, distance));
    }
    return mappoints;
}

function createRandomMapMarkers(map, mappoints) {
    for (var i = 0; i < mappoints.length; i++) {
        //Map points without the east/west adjustment
        var newmappoint = new google.maps.LatLng(mappoints[i].latitude, mappoints[i].longitude);
        var marker = new google.maps.Marker({
            position:newmappoint,
            map: map,
            title: mappoints[i].latitude + ', ' + mappoints[i].longitude + ' | ' + mappoints[i].distance + 'm',
            zIndex: 2
        });
        markers.push(marker);

        //Map points with the east/west adjustment
        var newmappoint = new google.maps.LatLng(mappoints[i].latitude, mappoints[i].longitude2);
        var marker = new google.maps.Marker({
            icon: 'https://maps.gstatic.com/mapfiles/ms2/micons/pink.png',
            position:newmappoint,
            map: map,
            title: mappoints[i].latitude + ', ' + mappoints[i].longitude2 + ' | ' + mappoints[i].distance2 + 'm',
            zIndex: 1
        });
        markers.push(marker);
    }
}
 
function showError(error)
  {
  switch(error.code)
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="Utilizador rejeitou a solicitação de Geolocalização."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="Localização indisponível."
      break;
    case error.TIMEOUT:
      x.innerHTML="O tempo da requisição expirou."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Algum erro desconhecido aconteceu."
      break;
    }
  }
</script>


		<script type="text/javascript">
		// <![CDATA[
            if (navigator.geolocation) {
 
                // Se conseguir fazer a leitura, chama a função posicao(). Se não conseguir, chama a função erro()
                navigator.geolocation.getCurrentPosition(posicao, erro);
            } else {
                alert('Seu navegador não tem suporte a geolocalização');
            }
 
            // Função chamada quando navigator.geolocation.getCurrentPosition CONSEGUE fazer a leitura
            function posicao(dados) {
 
                // Minhas coordenadas
                lat = dados.coords.latitude;
                lon = dados.coords.longitude;
 
                // Taxis
                taxis = new Array();
 
                taxi1 = new Array();
                taxi1[0] = 'Taxista Albino';
                taxi1[1] = '41.485503';
                taxi1[2] = '-7.178267';
                taxis[0] = taxi1;
				
				taxi2 = new Array();
				taxi2[0] = 'Taxista Belchior';
				taxi2[1] = '41.484266';
				taxi2[2] = '-7.183391';
				taxis[1] = taxi2;
				
				taxi3 = new Array();
				taxi3[0] = 'Taxista Bruninho';
				taxi3[1] = '41.481611';
				taxi3[2] = '-7.181915';
				taxis[2] = taxi3;
 
               
 
                // cria uma lista descritiva para os taxis
                lista = document.createElement('dl');
 
				
                // Percorre os taxis
                for (a = 0; a < taxis.length; a++) {
 
                    // nome taxi na lista
                    dt = document.createElement('dt');
                    dt.appendChild(document.createTextNode(taxis[a][0]));
                    lista.appendChild(dt);
					
						
                    // tempo de demora
                    dd = document.createElement('dd');
                    dd.appendChild(document.createTextNode(distancia(lat, lon, taxis[a][1], taxis[a][2]) + ' minutos para chegar ao seu local'));
                    lista.appendChild(dd);
	
					
                }
				
                // Mostra a lista no ecra
                document.getElementsByTagName('section')[0].appendChild(lista);
				
				
            }
			
			
            // Função chamada quando navigator.geolocation.getCurrentPosition NÃO consegue fazer a leitura
            function erro(dados) {
                switch (dados.code) {
                    case 1: 
                        alert('Você negou o acesso à sua localização!');
                        break;
                    case 2: 
                        alert('Não foi possível acessar sua posição!');
                        break;
                    case 3: 
                        alert('Timeout ao tentar pegar sua localização!');
                        break;
                }
            }
 
            // Calcula a distância em km entre dois pontos
            function distancia(latA, lonA, latB, lonB) {
                var tempo=(6371 * Math.acos(Math.cos(Math.PI * (90 - latB) / 180) * Math.cos(Math.PI * (90 - latA) / 180) + Math.sin(Math.PI * (90 - latB) / 180) * Math.sin(Math.PI * (90 - latA) / 180) * Math.cos(Math.PI * (lonA - lonB) / 180)))*(6/5);
				return tempo.toFixed(2);
			}
			
</script>
<h1>Voce encontra-se aqui:</h1>

<div id="mapholder"></div>

<p>Taxistas em serviço:</p>
<section></section>





<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="EET4HA8S7S3HL">
<input type="image" src="https://www.paypalobjects.com/pt_PT/PT/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - A forma mais fácil e segura de efetuar pagamentos online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>  
</div>
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
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>