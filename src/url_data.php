<?php


	return function(\Closure $token_renderer, array $args) {

		$svg = function($filename, $fill = '#000000') {
			$data = file_get_contents($filename) ?: '';
			$data = preg_replace("/fill=\".[^\"]+\"/", "fill=\"$fill\"", $data, 1);
			return sprintf("url(data:image/svg+xml;base64,%s)", base64_encode($data));
		};
	
	
		$image = function($filename, $mimetype) {
			$data = file_get_contents($filename) ?: '';
			return sprintf("url(data:%s;base64,%s)", $mimetype, base64_encode($data));
		};


		$filename = @$args[0] ?: '';


		if (preg_match('/\.svg$/', $filename)) {
			$fill = @$args[1] ?: '#000000';
			return $token_renderer($svg($filename, $fill));
		}
	
		elseif (preg_match('/\.gif$/', $filename)) {
			return $token_renderer($image($filename, 'image/gif'));
		}
	
		elseif (preg_match('/\.png$/', $filename)) {
			return $token_renderer($image($filename, 'image/png'));
		}
	
		elseif (preg_match('/\.jpg|\.jpeg$/', $filename)) {
			return $token_renderer($image($filename, 'image/jpeg'));
		}	
	};

?>