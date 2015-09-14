<?php
	try {
		$db = new PDO("mysql:host=localhost;dbname=library", "root", "root");
		// connection successful
		echo "Process Complete"; 
	}
	catch (Exception $error) {
		die("Connection failed: " . $error->getMessage());
	}

	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->beginTransaction();
		$db->exec("insert into books (ISBN, title, yearPublished, available) values (9780316127257, 'Why We Broke Up?', 2011, 8)" );
		$db->exec("insert into books (ISBN, title, yearPublished, available) values (9780062220967,'Asylum', 2013, 1)" );
		$db->commit();
	}
	catch (Exception $error) {
		$db->rollback();
		echo "Transaction not completed: " . $error->getMessage();
	}
?>