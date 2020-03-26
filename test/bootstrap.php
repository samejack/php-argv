<?php
include_once __DIR__ . '/../src/PHP/ArgvParser.php';
include_once __DIR__ . '/../vendor/autoload.php';

// backward compatibility
if (!class_exists('\PHPUnit_Framework_TestCase') && class_exists('\PHPUnit\Framework\TestCase'))
    class_alias('\PHPUnit\Framework\TestCase', '\PHPUnit_Framework_TestCase');
