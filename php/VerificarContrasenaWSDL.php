<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
//creamos el objeto de tipo soap_server
$ns="http://localhost";
$server = new soap_server();
$server->configureWSDL('fortaleza',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

//registramos la función que vamos a implementar
$server->register('fortaleza',
array('x'=>'xsd:string','ticket'=>'xsd:int'),
array('z'=>'xsd:string'),$ns);
//implementamos la función
function fortaleza ($x,$ticket){
		if ($ticket!=1010){return 'SIN SERVICIO';}
        $file = file_get_contents("../txt/toppasswords.txt");
        if (strpos($file, $x) === false) {
            return 'VALIDA';
        } 
        return 'INVALIDA';
}
//llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>