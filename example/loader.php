<?php
include_once(__DIR__ . '/../src/ArgvParser.php');

$argvParser = new \samejack\PHP_ArgvParser();

print_r($argvParser->parseConfigs());
