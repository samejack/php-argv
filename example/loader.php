<?php
include_once(__DIR__ . '/../src/PHP/ArgvParser.php');

$argvParser = new \samejack\PHP\ArgvParser();

print_r($argvParser->parseConfigs());
