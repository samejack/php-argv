<?php

namespace samejack\PHP;

class ArgvParser
{
    const MAX_ARGV = 1000;

    /**
     * Parse arguments
     * 
     * @param array|string [$message] input arguments
     * @return array Configs Key/Value
     */
    public function parseConfigs(&$message = null)
    {
        if (is_string($message)) {
            $argv = explode(' ', $message);
        } else if (is_array($message)) {
            $argv = $message;
        } else {
            global $argv;
            if (isset($argv) && count($argv) > 1) {
                array_shift($argv);
            }
        }

        $index = 0;
        $configs = array();
        while ($index < self::MAX_ARGV && isset($argv[$index])) {
            if (preg_match('/^([^-\=]+.*)$/', $argv[$index], $matches) === 1) {
                // not have ant -= prefix
                $configs[$matches[1]] = true;
            } else if (preg_match('/^-+(.+)$/', $argv[$index], $matches) === 1) {
                // match prefix - with next parameter
                if (preg_match('/^-+(.+)\=(.+)$/', $argv[$index], $subMatches) === 1) {
                    $configs[$subMatches[1]] = $subMatches[2];
                } else if (isset($argv[$index + 1]) && preg_match('/^[^-\=]+$/', $argv[$index + 1]) === 1) {
                    // have sub parameter
                    $configs[$matches[1]] = $argv[$index + 1];
                    $index++;
                } elseif (strpos($matches[0], '--') === false) {
                    for ($j = 0; $j < strlen($matches[1]); $j += 1) {
                        $configs[$matches[1][$j]] = true;
                    }
                } else if (isset($argv[$index + 1]) && preg_match('/^[^-].+$/', $argv[$index + 1]) === 1) {
                    $configs[$matches[1]] = $argv[$index + 1];
                    $index++;
                } else {
                    $configs[$matches[1]] = true;
                }
            }
            $index++;
        }

        return $configs;
    }
}
