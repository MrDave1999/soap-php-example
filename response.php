<?php  
function response_soap(bool $success, string $message, $data = null)
{
	return	[
		'success' => $success,
		'message' => $message,
        'data'    => $data
	];
}