<?php
require_once 'product.php';

// Crear la instancia del servidor
$server = new soap_server();

$server->configureWSDL('product', 'urn:product');
$server->wsdl->schemaTargetNamespace = 'urn:product';

// Agrega un tipo complejo (un struct) -- Representa un producto
$server->wsdl->addComplexType(
   'Product',
   'complexType',
   'struct',
   'all',
   '',
   [
	'id' 	        => 	['name' => 'id', 'type' => 'xsd:int'],
	'name' 	        => 	['name' => 'name', 'type' => 'xsd:string'],
	'price' 		=> 	['name' => 'price', 'type' => 'xsd:float'],
	'stock' 		=> 	['name' => 'stock', 'type' => 'xsd:int']
   ]
);

// Agrega un tipo complejo (un array) -- Representa un array de estructuras de tipo Producto
$server->wsdl->addComplexType(
	'ArrayProducts',
	'complexType',
	'array',
	'',
	'SOAP-ENC:Array',
    [],
    [
		[
            'ref' => 'SOAP-ENC:arrayType',
            'wsdl:arrayType' => 'tns:Product[]' 
        ]
    ]
);

// Agrega un tipo complejo (un struct) -- Representa una respuesta
$server->wsdl->addComplexType(
    'Response',
    'complexType',
    'struct',
    'all',
    '',
    [
     'success' 	=> 	['name' => 'success', 'type' => 'xsd:boolean'],
     'message'  =>  ['name' => 'message', 'type' => 'xsd:string'],
     'data'     =>  ['name' => 'data', 'type' => 'tns:ArrayProducts']
    ]
 );

// Registrar el método "getProductsByCategory" para exponerlo
$server->register('getProductsByCategory',
         ['category_name' => 'xsd:string'],   									// parameter
         ['return' 		  => 'tns:Response'],     	  						    // output
         'urn:product',                        									// namespace
         'urn:product#productServer',            								// soapaction
         'rpc',                               									// style
         'encoded',                           									// use
         'Obtiene una lista de productos de una categoria');                   	// description

// Usar la solicitud para invocar el servicio
$server->service(file_get_contents('php://input'));