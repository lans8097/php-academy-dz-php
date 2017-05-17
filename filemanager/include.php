<?php
//Корень сайта
define('ROOT',$_SERVER['DOCUMENT_ROOT']);
define('DS',DIRECTORY_SEPARATOR);
$error = ['error'=>[],'alert'=>[],'good'=>[]];

//Хлебные крошки
function breadCrumbs($dir)
{
    $lastDir='';
    //Обрезаем замыкающий слэш
    $dir = mb_substr($dir,0,mb_strlen($dir)-1);

    $links = explode(DS,$dir);

    for($i=0;$i<=count($links)-1;$i++){
        $lastDir.=$links[$i].DS;
        $name = ($links[$i] == '')?'ROOT'.'<span class="ds">'.DS.'</span>':$links[$i].'<span class="ds">'.DS.'</span>';
        if($i==count($links)-1){
            echo '<b>'.$name.'</b>';
        }else{
            echo '<a href="?dir='.$lastDir.'">'.$name.'</a>';
        }
    }
}

//вывод ошибок
function errorDisplay(array $error){
    $result='';
    $tmp = '';
    foreach ($error as $key => $value){
        if((!is_array($value) || !count($value)) || (empty($value))) continue;
        switch ($key){
            case 'error':
                $css = 'error';
                break;
            case 'alert':
                $css = 'alert';
                break;
            case 'good':
                $css = 'good';
                break;

            default:
                continue;
        }

        if(!is_array($value)){
            $result.='<p>'.$value.'</p>';
        }else{
            foreach ($value as $error){
                $result.='<p>'.$error.'</p>';
            }
        }

        $tmp = '<div class="'.$css.'">'.$result.'</div>';
    }

    return (!empty($tmp)?'<div class="message">'.$tmp.'</div>':'');
}