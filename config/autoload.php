<?php
spl_autoload_register("autoload");

function autoload($class)
{
    $path = BASE_PATH . "/models/$class.php";
    if (file_exists($path)) {
        require_once $path;
    }
}
