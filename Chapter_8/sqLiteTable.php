<?php
	$conn = new mysqli("localhost", "root", "root", "library");

	if($conn->connect_error){
    	trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
	}
  
	$sqlTable = "CREATE TABLE authors (authorid INTEGER AUTO_INCREMENT PRIMARY KEY, name TEXT)";

	if (!$conn->query($sqlTable)) 
		echo 'Create Failure - [' . $conn->error . ']<br/>';
	else
		echo "Table Authors was created <br/>";
	
	$sqlValues =<<<SQL
	INSERT INTO authors (name) VALUES ('J.R.R. Tolkien');
	INSERT INTO authors (name) VALUES ('Alex Haley');
	INSERT INTO authors (name) VALUES ('Tom Clancy');
	INSERT INTO authors (name) VALUES ('Isaac Asimov');
SQL;
	
	
	if(!$conn->query($sqlValues))
		echo 'Insert Failure - [' . $conn->error . ']<br/>';
	else
		echo "Insert to Authors - OK <br/>";
?>