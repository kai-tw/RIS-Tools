<?php
require_once 'code_convertor.php';

file_put_contents('output/RSCD0102.json', codeConvertor('https://www.ris.gov.tw/documents/data/5/1/RSCD0102.txt'));