<?php
require('Library.php');
$options = array("uri" => "http://localhost");
$server = new SoapServer ( null, $options);
$server->setClass('Library');
$server->handle() ;
?>
