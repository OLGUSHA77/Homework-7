
<?php
if (isset($_FILES['fileTest']['name']))
{
    $ext = pathinfo($_FILES['fileTest']['name'], PATHINFO_EXTENSION);
    if ($ext != 'json') {
        echo "Неверное расширение файла!";
        exit;
    }
}
if (isset($_FILES['fileTest']['name']))
{
    $myFile = $_FILES['fileTest']['name'];
    move_uploaded_file($_FILES['fileTest']['tmp_name'], $myFile);
    echo "Файл " . $myFile . " загружен";
}


?>

<form enctype="multipart/form-data" action="" method="POST">
    <input type="file" name="fileTest"><br>
    <input type="submit" value="Загрузка файла"><br>
    <a href="list.php">Выбор тестов</a>
</form>

