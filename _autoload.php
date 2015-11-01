<?php
define("BASE_DIR", __DIR__ . '/');

include_once BASE_DIR . 'vendor/bootstrap.php';

define('BASE_URL', 'http://' . Config::getConfig()['base_url']);
define('ASSETS_URL', BASE_URL . 'assets/');
