<?php
$fileList = glob("*.json");
$num = 1;

if (isset($_GET['text'])){
    $message = $_GET['text'];
    echo $message;
}
?>
<!DOCTYPE html>
<html>
    <body>
        <h3><strong>СПИСОК ТЕСТОВ</strong></h3>
        <form action="test.php"  method="GET">
            <p>Выберите тест:<br>
                <?php foreach ($fileList as $file) {
                echo '<label><input type="radio" name="status" value="' .$num.'">'.$file.'</label><br>';
                $num = $num + 1;
                }?></p>
            <p><input type="submit" value="Пройти тест"></p>
        </form>

        <h4><a href="admin.php">Администратор</a></h4>
    </body>
</html>