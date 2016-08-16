<?php

namespace Phpress\Tests;

class TestHelpers
{
    static function output($name, $result)
    {
        if($result === 'PASS')
        {
            echo "\033[0m$name : \033[32m$result\033[0m";
        }
        else if($result === 'STARTED')
        {
            echo "\033[0m$name : \033[33m$result\033[0m";
        }
        else if($result === 'ENDED')
        {
            echo "\033[0m$name : \033[34m$result\033[0m";
        }
        else
        {
            echo "\033[0m$name : \033[31m$result\033[0m";
        }
        echo "\r\n";
    }

    static function insertSeperator()
    {
        echo "\r\n";
        echo "====================";
        echo "\r\n";
        echo "\r\n";
    }
}