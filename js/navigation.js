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
  mapholder.style.height='300px';
  mapholder.style.width='600px';
 
  var myOptions={
  center:latlon,zoom:17,
  mapTypeId:google.maps.MapTypeId.SATELLITE,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"Sua localização!"});
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


    // <![CDATA[
            if (navigator.geolocation) {
 
                // Se conseguir fazer a leitura, chama a função posicao(). Se não conseguir, chama a função erro()
                navigator.gfunction createRandomMapMarkers(map, mappoints) {
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

geolocation.getCurrentPosition(posicao, erro);
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
                document.getElementsByTagName('panel-body')[0].appendChild(lista);
        
        
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