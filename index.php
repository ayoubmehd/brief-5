<?php

$action = "";
$ctr = "";

require_once "config/globals.php";

if (!isset($_GET["ctr"])) {
    $ctr = "home";
} else {
    $ctr = $_GET["ctr"];
}

if (!isset($_GET["action"])) {
    $action = "index";
} else {
    $ctr = $_GET["ctr"];
}

$ctr = ucfirst($ctr);

$file = "./controllers/" . $ctr . ".controller.php";
if (file_exists($file)) {
    require_once $file;
    if (class_exists($ctr)) {
        $app = new $ctr . "Controller"();
    }
    if (method_exists($app, $action)) {
        $app->$action();
    }
}
