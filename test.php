<!DOCTYPE html>
<html>
<body>
<form action="results.php" method="GET">
    <?php

    $fileList = glob("*.json");
    if (isset($_GET['status']))
    {
        $n = (int)$_GET['status'];
        $n = $n - 1;
        $curFileTest = $fileList[$n];

        if (!file_exists($curFileTest)) {
            echo "Файл с именем" . $curFileTest . "не существует!";
        }
    }
    $num = 1;
    ?>
    Имя файла: <input type="TEXT" name="nameFileTest" value="<?=$curFileTest?>"><br>
    <?php

    $data = json_decode(file_get_contents($curFileTest),true);
    foreach ($data as $item) {
        echo 'ВОПРОС #' . $item['number'] . ' ' . $item['Question'] . '<br>';
        echo '<label><input type="radio" value="1" name="question' . $num . '">'. $item['answer1']. '</label><br>';
        echo '<label><input type="radio" value="2" name="question' . $num . '">'. $item['answer2']. '</label><br>';
        echo '<label><input type="radio" value="3" name="question' . $num . '">'. $item['answer3']. '</label><br>';
        $num = $num + 1;
    }
    ?>
    <br><input type="submit" value="Готово">
</form>
<h2><a href="list.php">Выбор теста</a></h2>
</body>
</html>



