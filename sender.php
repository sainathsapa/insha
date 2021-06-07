<?php
	// Account details
	$apiKey = urlencode('pumoyhOgfUQ-13q78SRvWsUWgmKfo3kZoFP82vilyV');
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/get_sender_names/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here


	$rslt = json_decode($response, JSON_PRETTY_PRINT);



echo $rslt['status'];
?>