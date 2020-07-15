<?php

namespace samejack\PHP;

class ArgvParserTest extends \PHPUnit_Framework_TestCase
{

    public function testSingleArgument()
    {
        $argvParser = new ArgvParser();

        $string = '--ok';
        $result = $argvParser->parseConfigs($string);
        $this->assertEquals($result['ok'], true);
    }

    public function testParseConfigs()
    {
        $argvParser = new ArgvParser();

        $string = '-h 127.0.0.1 -u=user -p passwd --debug --max-size=3 test';

        $result = $argvParser->parseConfigs($string);

        $this->assertEquals($result['h'], '127.0.0.1');
        $this->assertEquals($result['u'], 'user');
        $this->assertEquals($result['p'], 'passwd');
        $this->assertEquals($result['debug'], true);
        $this->assertEquals($result['max-size'], '3');
        $this->assertEquals($result['test'], true);

        $commandArr = explode(' ', $string);

        $result = $argvParser->parseConfigs($commandArr);

        $this->assertEquals($result['h'], '127.0.0.1');
        $this->assertEquals($result['u'], 'user');
        $this->assertEquals($result['p'], 'passwd');
        $this->assertEquals($result['debug'], true);
        $this->assertEquals($result['max-size'], '3');
        $this->assertEquals($result['test'], true);

        $option = '--foo bar-baz';

        $result = $argvParser->parseConfigs($option);
        $this->assertEquals($result['foo'], 'bar-baz');

        global $argv;
        $argv = array_merge(array('filename'), $commandArr);

        $result = $argvParser->parseConfigs();

        $this->assertEquals($result['h'], '127.0.0.1');
        $this->assertEquals($result['u'], 'user');
        $this->assertEquals($result['p'], 'passwd');
        $this->assertEquals($result['debug'], true);
        $this->assertEquals($result['max-size'], '3');
        $this->assertEquals($result['test'], true);

    }

}
