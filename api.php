<?php
header('Access-Control-Allow-Origin: *'); 
switch ($_SERVER['REQUEST_METHOD']) {
        
  case 'GET': 

     function ConseguirIp() {
       if(isset($_SERVER['HTTP_CLIENT_IP'])) {
          return $_SERVER['HTTP_CLIENT_IP'];
       }
       elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          return $_SERVER['HTTP_X_FORWARDED_FOR'];
       }
       else {
          return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
      }
     }

     $IpApi = ConseguirIp(); 
     $InfoApi = @unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' .$IpApi)); 
  
     $DatoPais = $InfoApi['geoplugin_countryName'];
     $DatoCiudad    = $InfoApi['geoplugin_city'];
     $DatoContinente = $InfoApi['geoplugin_continentName'];
    

     $DatosUsuario = array(
       "Ip" => $IpApi,
       "Pais" => $DatoPais,
       "Ciudad" => $DatoCiudad
     );
     echo json_encode($DatosUsuario);     
break;
   default: 
}
?>