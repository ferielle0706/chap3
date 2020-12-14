<?php
$namespace = "http://www.TypeComplex.net/wsdl";

// Pull in the NuSOAP code
require_once('lib/nusoap.php'); 
// Create the server instance
$server = new nusoap_server();
$server->debug_flag = false;
$server->configureWSDL("TypeComplex", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

function MontantTnd ( $nbJour)
{

    $MontantTotal = 80* $nbJour ;

    return  $MontantTotal;
}

function Reservation ($NomCustumer)
 {
 return array(
 "Custumer" => $NomCustumer,
 "ReservationTitle" => "Welcome to our hotel",
 "ReservationnDate" => date("Y-m-d", time()),
 "ReservationDescription" => "have fun with us "
 );
 }

$server->wsdl->addComplexType(
    'Reservation',
    'complexType',
    'struct',
    'all',
    '',
    array(
    'Custumer' => array('name' => 'Custumer',
    'type' => 'xsd:string'),
    'ReservationTitle' => array('name' => 'ReservationTitle',
    'type' => 'xsd:string'),
    'ReservationDate' => array('name' => 'ReservationDate',
    'type' => 'xsd:date'),
    'ReservationDescription' => array('name' => 'ReservationDescription',
    'type' => 'xsd:string')
    )
    );

  // Register the method complex type to expose

        $server->register('Reservation',                    // method name
 array('Custumer' => 'xsd:string'),          // input parameters
 array('return' => 'tns:Reservation'),    // output parameters
 $namespace,                         // namespace
 $namespace . '#Reservation',                   // soapaction
 'rpc',                                    // style
 'encoded',                                // use
 'Get Specific Reservation'        // documentation
 );
// Register the method simple type to expose
$server->register('MontantTnd',
array( 'nbJour' => 'xsd:int'  ), //input
      array('MontantTotal' => 'xsd:float'),  //output
      $namespace,                         // namespace
 $namespace . '#MontantTnd',                   // soapaction
 'rpc',                                    // style
 'encoded',                                // use
 'Get Specific MontantTnd'        // documentation
 );
// Use the request to (try to) invoke the service
$server->service(file_get_contents("php://input"));
?>