<?php
// starting word
$word = new COM("word.application") or die("Unable to start Word app");
echo "Found and Loaded Word, version {$word->Version}\n";

//open an empty document
$word->Documents->add();

//do some weird stuff
$word->Selection->typeText("Hello World");
$word->Documents[1]->saveAs("/home/gelsyjuntilla/Desktop/php_com_test.doc");

//closing word
$word->quit();

//free the object
$word = null;

echo "all done!";
?>