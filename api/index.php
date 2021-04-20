<?php

$action = "";
$ctr = "";

require_once __DIR__ . "/../config/globals.php";

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

$file = __DIR__ . "/../controllers/" . $ctr . ".controller.php";
if (file_exists($file)) {
    require_once $file;
    $ctrClass = $ctr . "Controller";
    if (class_exists($ctrClass)) {
        $app = new $ctrClass();
    }
    if (method_exists($app, $action)) {
        $app->$action();
    }
}
