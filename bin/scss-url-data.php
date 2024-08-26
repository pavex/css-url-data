<?php

	$render = require dirname(__DIR__) . '/src/url_data.php'; 


	global $argv;
	array_splice($argv, 0, 1);
	$token = array_shift($argv);


	$scss_token_renderer = function($value) use($token) {
		return "\$$token: $value;\n";
	};


	echo $render($scss_token_renderer, $argv);

?>