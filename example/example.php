<?php
include_once(__DIR__ . '/../src/ArgvParser.php');

$argvParser = new \samejack\PHP_ArgvParser();

$string = '-h 127.0.0.1 -u=user -p passwd --debug --max-size=3 test';

print_r($argvParser->parseConfigs($string));
