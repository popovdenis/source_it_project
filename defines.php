<?php
$baseUrl = sprintf(
    "%s://%s%s",
    'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
);
define("BASE_DIR", realpath(dirname(__FILE__)));
define("BASE_URL", $baseUrl);