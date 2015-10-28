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
    <b>Add new question!</b><br><br>
    Question: <input type="text" name="question"/><br>
    Answers (answers may be one or more) :<br><br>
    a) <input type="text" name="answer_a"/><br>
    b) <input type="text" name="answer_b"/><br>
    c) <input type="text" name="answer_c"/><br>
    d) <input type="text" name="answer_d"/><br>
    e) <input type="text" name="answer_e"/><br>
    <input type="submit" name="submit" value=" отправить "/>

</form>
</body>
</html>