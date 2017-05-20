<?php
namespace Libs;


class Config
{
    private static $array = [];

    static function start()
    {
        $configs = explode(',',CONFIGS);
        self::add($configs);
    }

    //in config kay
    //out value with key
    static function get($key)
    {
        return (array_key_exists($key, self::$array))?self::$array[$key]:NULL;
    }

    /**
     * add config
     * in array or string name config file
     */
    static function add($fileName)
    {
        $config = [];
        if(is_array($fileName)){
            foreach ($fileName as $item){
                if(array_key_exists($item, self::$array)) continue;
                require CONFIG_DIR.DS.$item.'.php';
                self::$array[$item] = $config;
            }
        }else
            if(!array_key_exists($fileName, self::$array)){
            require CONFIG_DIR.DS.$fileName.'.php';
            self::$array[$fileName] = $config;
        }
    }
}