<?php
$dir = 'tests';
if (is_dir($dir))
{
    $fileList = scandir($dir);
    array_shift($fileList); // удаляем из массива '.'
    array_shift($fileList); // удаляем из массива '..'
}
if (isset($_GET['text']) && $_GET['text']==true) {
    echo "Вы ответили не на все вопросы. Попробуйте еще раз!";
}?>

<!DOCTYPE html>
<html>
    <body>
        <h3><strong>СПИСОК ТЕСТОВ</strong></h3>
        <form action="test.php"  method="GET">
            <p>Выберите тест:<br>
                <?php $num = 1;
                foreach ($fileList as $file) {
                echo '<label><input type="radio" name="status" value="' .$num.'">'.$file.'</label><br>';
                $num = $num + 1;
                }?></p>
            <p><input type="submit" value="Пройти тест"></p>
        </form>

        <a href="admin.php">Загрузка тестов</a>
    </body>
</html>