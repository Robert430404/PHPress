<?php

/**
 * Load Up The composer Autoloader
 */

include 'vendor/autoload.php';

/**
 * Use Declarations For Test Namespaces
 */
use Phpress\Tests\WPQueryTests\ArgsTests;

/**
 * Run Tests
 */
$ArgsTests = new ArgsTests();
$ArgsTests->testBaseArgs();