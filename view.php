<?php
include_once("defines.php");
?>
<html>
<head>
    <title>Online-test</title>
    <meta charset="UTF-8">
</head>
<body>
<form action="controller.php" method="post">

    <b>Добавте вопрос!</b><br><br>
    Вопрос: <input type="text" name="question"/><br>
    Вводите 5 вариантов ответов , напротив правильных вариантов поставте галочку и нажмите "отправить" :<br><br>
    a) <input type="text" name="answer_a"/> <input type='checkbox' name="wrightAnswer_a" value="1"><br>
    b) <input type="text" name="answer_b"/> <input type='checkbox' name="wrightAnswer_b" value="1"><br>
    c) <input type="text" name="answer_c"/> <input type='checkbox' name="wrightAnswer_c" value="1"><br>
    d) <input type="text" name="answer_d"/> <input type='checkbox' name="wrightAnswer_d" value="1"><br>
    e) <input type="text" name="answer_e"/> <input type='checkbox' name="wrightAnswer_e" value="1"><br>
    <input type="submit" name="submit" value=" отправить "/>

</form>
</body>
</html>