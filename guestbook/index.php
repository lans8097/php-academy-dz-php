<?php
require_once('include.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="Cache-Control" content="private">
</head>
<body>
<?php
if(!empty($_GET['error'])){
    foreach(json_decode($_GET['error'], true) as $item){
        if(empty($item))continue;
        echo '<p>'.$item.'</p>';
    }

}
?>
<div class="main border">
    <form action="add.php" method="post">
    <div class="messageForm border">
            <div class="head">
                <span>Name:</span>
                <input type="text" name="name">
                <span>email:</span>
                <input type="email" name="email">
            </div>
            <textarea name="message" id="" ></textarea>
            <button type="submit">Добавить</button>
    </div>
    </form>

    <?php
    $file = ROOT.$config['dbFile'];
    //Проверяем сущестования файла с сообщениями
    if(file_exists($file)){
        $file = file($file);
        foreach ($file as $json){
            $message = json_decode($json, true);
            ?>
            <div class="message border">
                <div class="head">
                    <span>Name: <?=$message['name']?></span> |
                    <span>Email: <?=$message['email']?></span> |
                    <span>Date: <?=date('d-m-Y h:i', $message['date'])?></span>
                </div>
                <div class="messageText">
                    <?=htmlspecialchars($message['text'])?>
                </div>
            </div>
        <?
        }
    }else{
        echo '<h3>Нет комментариев.</h3>';
    }
    ?>
</div>

</body>
</html>
