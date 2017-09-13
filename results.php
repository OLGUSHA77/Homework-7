<?php
$massAnswer = [];
$massTrueAnswer = [];
if ((isset($_GET['question1'])) && (isset($_GET['question2'])) &&
    (isset($_GET['question3'])) && (isset($_GET['question4'])) &&
    (isset($_GET['question5']))) {
    $massAnswer[] = $_GET['question1'];
    $massAnswer[] = $_GET['question2'];
    $massAnswer[] = $_GET['question3'];
    $massAnswer[] = $_GET['question4'];
    $massAnswer[] = $_GET['question5'];
}
else {
    header("Location: list.php?text=\"Вы ответили не на все вопросы. Попробуйте еще раз\"");
}

if (isset($_GET['nameFileTest']))
{
   $fileNameTest = $_GET['nameFileTest'];
   $dataJSON = json_decode(file_get_contents($fileNameTest),true);

   foreach ($dataJSON as $item)
   {
       $massTrueAnswer[] = $item['true_answer'];
   }
}

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
            <p><input type="TEXT" name="userName" placeholder="Введите ваше имя" size="35px">
            <input type="TEXT" name="userSurname" placeholder="Введите вашу фамилию" size="55px">
            <input type="submit" value="ОК"></p>
        </form>
        <h4><a href="admin.php">Администратор</a></h4>
    </body>
</html>