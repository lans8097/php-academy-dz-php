<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 10.05.2017
 * Time: 11:34
 */
if(!empty($_POST)){
    $name = (!empty($_POST['name']))?trim($_POST['name']):false;
    $text = (!empty($_POST['message']))?trim($_POST['message']):false;
    $errors = [];

    //validate
    if(!$name){
        $errors[]= 'Вы забыли указать имя.';}
    elseif (mb_strlen($name) < 2  || mb_strlen($name) > 20){
        $errors[] = 'Допустимая длина имени мин 2 максимум 20 символов';}

    if(!$text){
        $errors[]= 'Вы забыли написать хоть что-то.';
    }elseif (mb_strlen($text) < 10 || mb_strlen($text) > 200){
        $errors[] = 'Допустимая длина сообщения мин 10 максимум 200 символов';}

    //Если ошибок нет то продолжаем
    if(!count($errors)){
        if(file_put_contents('message.dat', json_encode(['name'=>$name, 'text'=>$text, 'date'=> mktime()])."\n",FILE_APPEND | LOCK_EX)){
            //Переадрессовыеваем для избежания зацикливания
            header('location: 7.php');
        }
        else{
            $errors[] = 'Не удалсоь добавить запись';
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>7. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все добавленные комментарии выводятся над текстовым полем.</title>
    <style type="text/css">
        body{
            background-color: #EAEAEA;
        }

        p,h1,h2,h3,h4{
            margin:0px;
            padding: 0px;
        }

        div.main{
            max-width:900px;
            border: solid #C4C4C4 1px;
            margin: 0px auto;
            background-color: #FFFFFF;
        }

        div.title{
            border-bottom: solid #C4C4C4 1px;
            padding: 5px;
        }

        div.content{
            padding:5px;
        }

        div.addForm{
            width: 405px;
            margin: 5px;
            padding: 5px;
            border: solid #C4C4C4 1px;
        }

        div.addForm textarea, input{
            width: 400px;
        }

        div.message{
            border: solid #C4C4C4 1px;
            margin: 5px;
        }

        div.message > div.messageHead{
            border-bottom: solid #C4C4C4 1px;
            background-color: #DEDEDE;
        }

        div.message > div.messageHead > div{
            display: inline-block;
        }

        div.message > div.MessageText{
            padding: 5px;
        }

        div.errorList{
            border: solid red 1px;
            background-color: #FF7A7A;
        }

        div.errorList p{
            margin: 5px;
            color: #FFFFFF;
        }

    </style>
</head>
<body>


<div class="main">
    <div class="title">
        <h3>Задание №7</h3>
        <p>Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все добавленные комментарии выводятся над текстовым полем.</p>
    </div>
    <div class="content">
        <div class="addForm">
            <form action="7.php" method="post">
                <p><lable>Имя:</lable></p>
                <input type="text" name="name"><br>
                <p><lable>Сообщение:</lable></p>
                <textarea name="message" cols="30" rows="10"></textarea>
                <p><button>Добавить</button></p>
            </form>

            <?php
            if(!empty($errors) && count($errors)){
                echo '<div class="errorList">';
                foreach ($errors as $error){
                    echo '<p>'.$error.'</p>';
                }
                echo '</div>';
            }
            ?>
        </div>

        <?php
        if(file_exists('message.dat')){
            $file = file('message.dat');

            foreach ($file as $key => $line){
                $message = json_decode($line, true);
                echo '
                <div class="message">
                    <div class="messageHead">
                        <div class="fieldName"><b>#</b>'.++$key.'</div>
                        <div class="fieldName"><b>Имя:</b> '.$message['name'].'</div>
                        <div class="fieldDate"><b>Дата:</b>'.date('d-m-y h:i:s',$message['date']).'</div>
                    </div>
                    <div class="MessageText">'.htmlspecialchars($message['text']).'</div>
                </div>
                ';
            }
        }
        ?>


    </div>
</div>

</body>
</html>
