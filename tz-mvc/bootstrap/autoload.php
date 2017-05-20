<?php
//Подключяем автозагрузчик классов
require_once 'NamespaceAutoloader.php';

function dd($val)
{
    echo '<pre>';
    print_r($val);
    echo '</pre>';

}

$AutoLoader = new NamespaceAutoloader();
$AutoLoader->register();

Libs\Config::start();
App\Router::start();
