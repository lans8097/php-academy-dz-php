<?php
namespace App;

class Router{

    //default route param
    private static $defaultRout=['home','index']; //[0] class Name [1] method name

    static function start()
    {
        //Получаем роут
        $url = (!empty($_GET['url']))?$_GET['url']:null;

        if($url !== null) {
            //Разбиваем на сегменты и заполняем по умолчанию
            $routes = explode('/', $url);

            //Если оброщаются непосредственно к обекту главной страници то перекидываем в корень сайта для избежания дубля
            if($routes[0]==self::$defaultRout[0]){
                self::redirect('/',false,301);
                die();
            }

            $routes = array_replace(self::$defaultRout,$routes);
        }
        else {
            //заполняем по умолчанию
            $routes=self::$defaultRout;
        }

        $actionName     = 'get'.ucfirst($routes[1]);
        $controllerName = 'App\Controllers\\'.ucfirst($routes[0]);

        if(file_exists(ROOT.$controllerName.'.php') && class_exists($controllerName)){
            $Obj = new $controllerName();
            if(method_exists($Obj, $actionName)){
                $Obj->{$actionName}();
                return true;
            }
        }

        self::ErrorPage404();
    }

    static function ErrorPage404()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        die();
    }

    static function redirect($url, $replace = false, $code = 200)
    {
        header('location:'.$url, $replace , $code);
    }
}