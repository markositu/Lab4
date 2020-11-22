<?php
//incluimos la clase nusoap.php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
//creamos el objeto de tipo soapclient.
//http://www.mydomain.com/server.php se refiere a la url
//donde se encuentra el servicio SOAP que vamos a utilizar.

$soapclient = new nusoap_client( 'http://localhost/lab3/php/VerificarContrasenaWSDL.php?wsdl',true);
//Llamamos la función que habíamos implementado en el Web Service
//e imprimimos lo que nos devuelve

if( $soapclient->call('fortaleza',array( 'x'=>$_GET['password'],'ticket'=>1010))=='INVALIDA'){
	echo '<h3 id="vip2" style="color: red;">La contraseña no es muy fuerte</h3>';
} 

else{
echo '<h3 id="vip2" style="color: green;">La contraseña es segura</h3>';
}

?>