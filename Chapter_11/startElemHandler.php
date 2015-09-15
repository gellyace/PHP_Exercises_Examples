<?php

	function startElement($parser, $name, $attributes) {
		$outputAttributes = array();
        
        if (count($attributes)) {
			foreach($attributes as $key) {
				$value = $attributes[$key];
				$outputAttributes[] = "<font color=\"gray\">{$key}=\"{$value}\"</font>";
			}
		}

		echo "&lt;<b>{$name}</b> " . join(' ', $outputAttributes) . '&gt;';
	}
?>
