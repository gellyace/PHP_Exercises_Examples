<?php
	$image = imagecreate(70, 350);
	$white = imagecolorallocate($image, 255, 255, 255);
	$black = imagecolorallocate($image, 0, 0, 0);

	// set the path for GD to look for TrueType paths
	putenv("GDFONTPATH=" . realpath('.'));

	imagettftext($image, 20, 270, 28, 10, $black, 'courier', "The Courier TTF font");
	header("Content-Type: image/png");
	imagepng($image);
?>