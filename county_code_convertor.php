<?php
$raw = mb_convert_encoding(file_get_contents('import.txt'), 'utf-8', 'auto');
$lines = explode("\n", $raw);

echo 'INSERT INTO `county_name`(`county_code`, `name`) VALUES ';

$part = [];

foreach ($lines as $line) {
	if (mb_strlen($line, 'utf-8') <= 0)
		continue;
	
	$code = mb_substr($line, 0, mb_strpos($line, '=', 0, 'utf-8'), 'utf-8');
	$name = mb_substr($line, mb_strpos($line, '=', 0, 'utf-8') + 1, mb_strlen($line, 'utf-8'), 'utf-8');
	$str = "({$code}, '{$name}')";
	array_push($part, $str);
}

$part = implode(', ', $part);

echo $part;