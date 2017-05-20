<?php
namespace Libs;
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 07.09.2016
 * Time: 12:21
 */
class View
{
    public function render($name,array $date=[])
    {
        $date['config'] = Config::get('app');
        extract($date);
        require_once APP.'Views'.DS.$name.'.php';
    }

}