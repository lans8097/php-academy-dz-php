<?php
require_once('include.php');
$error = [];

if($_POST){
    $name   = ((!empty($_POST['name']))?$_POST['name']:null);
    $email  = ((!empty($_POST['email']))?$_POST['email']:null);
    $message= ((!empty($_POST['message']))?$_POST['message']:null);

    //validation
    if($name === null) $error[] = 'Поле Имя должно быть заполненым';
    if($message === null)$error[] = 'Поле Message должно быть заполненым';
    if($email === null) {
        $error[] = 'Поле Email должно быть заполненым';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error[] = 'Поле Email заполнено не коректно';
    }


    if(!count($error)){
        if(file_put_contents(ROOT.$config['dbFile'], json_encode(['name'=>$name, 'email' =>$email, 'text'=>$message, 'date'=> time()])."\n",FILE_APPEND | LOCK_EX)){
            //Переадрессовыеваем для избежания зацикливания
            header('location: index.php');
            die();
        }
        else{
            $error[] = 'Не удалсоь добавить запись';
        }
    }

    header('location: index.php?error='.json_encode($error));
}else{
    die('no lol....');
}