<?php
include_once "Log.php";
session_start();
?>

<html>
<head>
	<title>Front Page</title>
</head>
<body>
<?php 
    $now = strftime("%c");

    if(!isset($_SESSION['l'])){ // session_is_registered('l') --> isset($_SESSION['l'])

    	
    	$logger = new Log("/tmp/persistent_log");
    	$_SESSION['l'];
    	$logger->write("Created $now");
    	echo ("<p>Created session and persistent log object. </p>");
    }

    $logger->write("Viewed first page {$now}");
    echo "<p>the log contains: </p>";
    echo nl2br($logger->read());
?>

<a href="next.php">Move to the next page</a>
</body>
</html>