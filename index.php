<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 29.10.2015
 * Time: 1:00
 */
require_once __DIR__ . "/vendor/LibraryController/FrontControllerInterface.php";
require_once __DIR__ . "/vendor/LibraryController/FrontController.php";

use LibraryController\FrontControllerInterface;
use LibraryController\FrontController;

$frontController = new \LibraryController\FrontController();
$frontController->run();

//$frontController = new \LibraryController\FrontController(
//    array(
//        "controller" => "Index",
//        "action" => "show",
//        "params" => array(1)
//    )
//);
//
//$frontController->run();