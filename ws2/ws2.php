<?php
$namespace = "http://www.Convert.net/wsdl";
// Pull in the NuSOAP code

require_once('lib/nusoap.php'); 
// Create the server instance
$server = new nusoap_server();
$server->debug_flag = false;
$server->configureWSDL("Convert", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;
// Define the method as a PHP function

function ConvertTNDToUSD( $nbJour){
    require('ws1.php');
  
  $montant = MontantTnd($nbJour ) ;
  $numberUSD = $montant * 0.36419;
   return  $numberUSD;
   }
// Register the method to expose
      $server->register('ConvertTNDToUSD',
      array ('nbJour' => 'xsd:int' ),
      array('numberUSD' => 'xsd:float'),  //output
      $namespace, 
            $namespace . '#ConvertTNDToUSD',                   // soapaction
            'rpc',                                    // style
            'encoded',                                // use
            'Get Specific ConvertTNDToUSD'        // documentation
            );
           
// Use the request to (try to) invoke the service
$server->service(file_get_contents("php://input"));
?>
