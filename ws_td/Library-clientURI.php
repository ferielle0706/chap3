<?php
$options = array (
    "location" => "http://localhost/mywebservices/Library-server.php",
    "uri" => "http://localhost",
    'trace'=> 1) ;
    try{
        $client=new SoapClient(null,$options);
        $resultat=$client->getBooks();
        echo '<br/><h1>Service Reponse</h1>';
        print_r($resultat); }

    catch (SoapFault $e){
    echo '</br><h1> Error:</h1>';
    var_dump($e);}
    //print soap request and reponse (debug)
    echo'</br><h1> SOAP REQUEST </h1>'.htmlspecialchars($client->__getLastRequest()).'</br>';
    echo'</br><h1> SOAP REPONSE</h1>'.htmlspecialchars($client->__getLastReponse()).'</br>';
?>