<?php
/**
 * @return {string} JSON
 */
function cityCodeConvertor(string $path) {
	$raw = mb_convert_encoding(file_get_contents($path), 'utf-8', 'big5');
	$lines = explode("\n", $raw);

	$array = [];

	foreach ($lines as $line) {
		if (mb_strlen($line, 'utf-8') <= 0)
			continue;
			
		$pos = mb_strpos($line, '=', 0, 'utf-8');
		$len = mb_strlen($line, 'utf-8');
		
		$code = mb_substr($line, 0, $pos, 'utf-8');
		$name = mb_substr($line, $pos + 1, $len - $pos - 2, 'utf-8');
		$array[$code] = $name;
	}
	
	return json_encode($array, JSON_UNESCAPED_UNICODE);
}