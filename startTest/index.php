<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../res/css/materialize.min.css" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="../res/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../res/js/materialize.min.js"></script>
</head>
<body class="deep-orange lighten-5">

<nav>
    <div class="nav-wrapper  red lighten-2">
        <a href="#" class="brand-logo right">Online-test</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="index.php">На главную</a></li>
        </ul>
    </div>
</nav>

<div class="container row">

    <div class="col l5 offset-l4">

        <h3 class="flow-text cyan-text text-darken-4">Пройдите тест!</h3>

        <form action="test.php" method="post">

            <input type="hidden" name="test">
            <button class='waves-effect waves-teal btn-large' type="submit">
                <i class='material-icons left large'>play_circle_outline</i>Начать тест
            </button>
        </form>
    </div>

</div>
</body>
</html>
