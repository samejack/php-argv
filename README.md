# php-argv
[![Latest Stable Version](https://poser.pugx.org/samejack/php-argv/v/stable)](https://packagist.org/packages/samejack/php-argv)
[![Build Status](https://travis-ci.org/samejack/php-argv.svg?branch=master)](https://travis-ci.org/samejack/php-argv) [![Coverage Status](https://coveralls.io/repos/samejack/php-argv/badge.svg?branch=master)](https://coveralls.io/r/samejack/php-argv?branch=master)
[![License](https://poser.pugx.org/samejack/php-argv/license)](https://packagist.org/packages/samejack/php-argv)

PHP CLI (command-line interface) argurments parser. PHP-Argv can parse rich pattern, such as the follows

## Install by composer
```javascript
composer require samejack/php-argv
```


## CLI Example
```
$ ./example/bin-cli -h 127.0.0.1 -u=user -p passwd --debug --max-size=3 test
Array
(
    [h] => 127.0.0.1
    [u] => user
    [p] => passwd
    [debug] => 1
    [max-size] => 3
    [test] => 1
)
```

## PHP Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$argvParser = new \samejack\PHP\ArgvParser();

$string = '-h 127.0.0.1 -u=user -p passwd --debug --max-size=3 test';

print_r($argvParser->parseConfigs($string));
```
Output:
```php
Array
(
    [h] => 127.0.0.1
    [u] => user
    [p] => passwd
    [debug] => 1
    [max-size] => 3
    [test] => 1
)
```


## License
Apache License 2.0
