<?php
	$authorId = 'ktatroe';
	$url = "http://example.com/api/authors/{$authorId}";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);

	$response = curl_exec($ch);
	$resultInfo = curl_getinfo($ch);

	curl_close($ch);
	
	// decode the JSON and use a Factory to instantiate an Author object
	$authorJson = json_decode($response);
	$author = ResourceFactory::authorFromJson($authorJson);

?>