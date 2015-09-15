<?php

	function fillTemplate($name, $values = array(), $unhandled = "delete") {
		$templateFile = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $name;
		
		if ($file = fopen($templateFile, 'r')) {
			$template = fread($file, filesize($templateFile));
			fclose($file);
		}

		$keys = array_keys($values);

		foreach ($keys as $key) {
			// look for and replace the key everywhere it occurs in the template
			$template = str_replace("{{$key}}", $values[$key], $template);
		}

		if ($unhandled == 'delete') {
			// remove remaining keys
			$template = preg_replace('/{[^ }]*}/i', '', $template);
		}
		else if ($unhandled == 'comment') {
			// comment remaining keys
			$template = preg_replace('/{([^ }]*)}/i', '<!-- \\1 undefined -->', $template);
		}
		
		return $template;		
	}


?>