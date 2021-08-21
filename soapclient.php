<?php
require_once './lib/nusoap.php';

if(count($argv) === 1)
{
   echo 'Error: You must pass an argument to the script!';
   exit();
}

// Esta es la dirección URL de su servidor de servicios web WSDL
$wsdl = 'http://localhost:8080?wsdl';

// Crear objeto cliente
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) 
{
   echo 'Error: ' . $err;
   exit();
}

// Llama al método "getProductsByCategory"
$products = $client->call('getProductsByCategory', [ 'category_name' => $argv[1] ]);
$err = $client->getError();
if ($err) 
{
   echo 'Error: ' . $err;
   exit();
}
var_dump($products);
/*
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
// Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
*/