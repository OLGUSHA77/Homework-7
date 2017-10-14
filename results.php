<?php
const countQuestion = 5;
$massAnswer = [];
$massTrueAnswer = [];

if (isset($_GET) && count($_GET) >= countQuestion)
{
    foreach ($_GET as $key=>$item)
    {
        if (strrpos($key, "question") !== false){
            $massAnswer[] = $item;
        }
    }
}
else {
    header("Location: list.php?text=true");
}
//echo "<pre>";
//var_dump($massAnswer);

if (isset($_GET['nameFileTest']))
{
   $fileNameTest = $_GET['nameFileTest'];
   $dataJSON = json_decode(file_get_contents('tests/' . $fileNameTest),true);

   foreach ($dataJSON as $item)
   {
       $massTrueAnswer[] = $item['true_answer'];
   }
}
else {
    http_response_code(404);
    echo "Cтраница не найдена!";
    exit(1);
}
//echo "<pre>";
//var_dump($massTrueAnswer);

$result = array_diff_assoc($massAnswer, $massTrueAnswer);

if ($result == null){
    $messageResult = "Все верно. Вы правильно прошли тест! Поздравляем!";
}
else{
    header("location: list.php?text=\"К сожалению, Вы не прошли тест. Попробуйте еще раз\"");
}

?>

<!DOCTYPE html>
<html>
    <body>
        <h2><strong>ВАШИ РЕЗУЛЬТАТЫ</strong></h2>
        <p><strong><?=$messageResult?></strong></p>
        <p>Введите Ваше имя и Фамилию для сертификата:</p>
        <form action="captcha.php"  method="GET">
            <p><input type="TEXT" name="userName" placeholder="Введите ваше имя" size="35px"></p>
            <p><input type="TEXT" name="userSurname" placeholder="Введите вашу фамилию" size="55px"></p>
            <p><input type="submit" value="ОК"></p>
        </form>
        <p><a href="admin.php">Загрузка тестов</a></p>
        <p><a href="list.php">Выбор тестов</a></p>
    </body>
</html>