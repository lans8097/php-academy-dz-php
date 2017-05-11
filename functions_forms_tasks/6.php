<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 10.05.2017
 * Time: 8:59
 */
//Дериктория с файлами
define('GALLERY_DIR',__DIR__.'\gallery\\');

$rulers =[
    'max_size' => 1000,
    'types' =>[
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',]
];

function imageLoader($dir){
    $resulr = [];
    foreach (scandir($dir) as $line){
        if($line !=='.' &&
            $line !== '..' &&
            !is_dir($dir.$line) &&
            in_array(image_type_to_mime_type(exif_imagetype($dir.$line)),['image/jpeg','image/png','image/gif'])){
            $resulr[] = $line;
        }
    }

    return $resulr;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6. Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.</title>
</head>
<body>
<?php
$imageCount = count($_FILES['images']['tmp_name'])-1;
for ($i=0;$i<=$imageCount;$i++){
    $error = $_FILES['images']['error'][$i];
    if($error<0){
        //Проверка на ошибки
        switch ($error){
            case 1 : die('file: <b>'.$name.'</b> Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini.'); break;
            case 2 : die('file: <b>'.$name.'</b> Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме.'); break;
            case 3 : die('file: <b>'.$name.'</b> Загружаемый файл был получен только частично.'); break;
            case 4 : die('file: <b>'.$name.'</b> Файл не был загружен'); break;
            case 6 : die('file: <b>'.$name.'</b> Отсутствует временная папка.'); break;
            case 7 : die('file: <b>'.$name.'</b> Не удалось записать файл на диск.'); break;
            case 8 : die('file: <b>'.$name.'</b> PHP-расширение остановило загрузку файла.'); break;
        }
    }else{
        //проверяем что изображение
        if(in_array(image_type_to_mime_type(exif_imagetype($_FILES['images']['tmp_name'][$i])), $rulers['types'])){
            //Проверяем размер
            if(filesize($_FILES['images']['tmp_name'][$i])>$rulers['max_size']){
                //Переносим файл в постоянное хранилище и переименновываем его
                if(move_uploaded_file($_FILES['images']['tmp_name'][$i],GALLERY_DIR.date('dmyHGs').$_FILES['images']['name'][$i])){
                    echo 'файл:'.$_FILES['images']['name'][$i].' успешно загружен<br>';
                }else{
                    die('файл:'.$_FILES['images']['name'][$i].' не удалось перенести в постоянное хранилище');
                }
            }else{
                die('Файл:'.$_FILES['images']['name'][$i].' слишком велик, макс размер '.($rulers['max_size']/1024).' Кб');
            }
        }else{
            die('Не тот формат. допустимые "'.implode(',',$rulers['types']).'".');
        }
    }
}
?>
<form action="6.php" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" accept="image/*" multiple>
    <button type="submit">Загрузить</button>
</form>
<?php
    $images = imageLoader(GALLERY_DIR);
    $count=count($images);
    $col=1;
    if($count){
        for($i=0;$i<=$count-1;$i++){
            if($col == 0) $table.='<tr>';
            $table.='<td><img src="gallery/'.$images[$i].'" width="250px"></td>';
            if($col == 3 || $i>$count) {$table.='</tr>'; $col = 0;}
            $col++;
        }
        echo '<table border="1">'.$table.'</table>';

    }else{
        echo '<h4>Нет картинок для отображения</h4>';
    }
?>
</body>
</html>