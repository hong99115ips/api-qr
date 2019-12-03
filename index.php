<?php

require './vendor/autoload.php';

header('Content-type: application/json');

if(isset($_GET['k']) and isset($_GET['v'])) {
	
	if(in_array($_GET['k'], ['erp_nikkata'])) {
		
		$file_name = time().'-'.rand(1111, 9999);
		
		\PHPQRCode\QRcode::png($_GET['v'], 'temp/'.$_GET['k'].'-'.$file_name.'.png', 'L', 50, 1);
		
		header('Content-type: image/png');
		
		echo file_get_contents('temp/'.$_GET['k'].'-'.$file_name.'.png');
		
	} else {
		
		echo json_encode(['status' => 'failed', 'message' => 'API error']);
		
	}
	
} else {
	
	echo json_encode(['status' => 'failed', 'message' => 'Param error']);
	
}