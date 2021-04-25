<?php

require_trait("http");
abstract class AbstructController
{

    use Http;

    protected function view(string $file)
    {
        $path = BASE_PATH . "views/" . $file . ".php";
        if (file_exists($path)) {
            require_once $path;
        }
    }
    protected function trait(string $file)
    {
        $path = BASE_PATH . "/traits/" . $file;
        if (file_exists($path)) {
            require_once $path;
        }
    }
}
