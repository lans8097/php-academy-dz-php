<?php
error_reporting(E_ALL);
//Обявление констант
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',realpath('..'.DS).DS);

require(ROOT.'define.php');
require(ROOT.'bootstrap'.DS.'autoload.php');