<html>
	<head>
		<title>Results!</title>
	</head>
<body>
	<?php function handle_errors ($error, $message, $filename, $line) {
		ob_end_clean();
		echo "<b>{$message}</b><br/> in line {$line}<br/> of ";
		echo "<i>{$filename}</i></body></html>";
	
		exit;
	}

	set_error_handler('handle_errors');
	ob_start(); 
	?>

	<h1>Results!</h1>
		<p>Here are the results of your search:</p>
		<table border="1">
			<?php require_once('DB.php');
				$db = DB::connect('mysql://gnat:waldus@localhost/webdb');
				if (DB::iserror($db)) {
					die($db->getMessage());
				} 
			?>
		</table>
</body>
</html>
