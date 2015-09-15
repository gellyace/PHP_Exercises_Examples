<?php
	function endElement($parser, $name){
		echo "&lt;<b>/{$name}</b>&gt;";
	}
?>