<?php

	putenv("GDFONTPATH=" . realpath('.'));

	$font = "courier";
	$size = isset($_GET['size']) ? $_GET['size'] : 20;
	$text = isset($_GET['text']) ? $_GET['text'] : '';
	
	$path = "/tmp/buttons"; // button cache directory

	// send cached version
	if ($bytes = @filesize("{$path}/{$text}.jpg")) {
		header("Content-Type: image/jpeg");
		header("Content-Length: {$bytes}");
		readfile("{$path}/{$text}.jpg");
		exit;
	}

	//otherwise, we have to build it, cache it, and return it
	$image = imagecreatefromjpeg("fig02.jpg");
	$black = imagecolorallocate($image, 0, 0, 0);

	if ($text) {
		// calculate position of text
		$tsize = imagettfbbox($size, 0, $font, $text);
		$dx = abs($tsize[2] - $tsize[0]);
		$dy = abs($tsize[5] - $tsize[3]);
		$x = (imagesx($image) - $dx ) / 2;
		$y = (imagesy($image) - $dy ) / 2 + $dy;

		// draw text
		imagettftext($image, $size, 0, $x, $y, $black, $font, $text);

		//save image to file
		imagejpeg($image, "{$path}/{$text}.jpg");
	}

	
	header("Content-Type: image/jpeg");
	imagejpeg($image);
?>