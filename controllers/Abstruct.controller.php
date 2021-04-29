<?php

require_trait("http");
abstract class AbstructController
{

    use Http;


    // User info
    function userid()
    {
        return isset($_SESSION["user"]) ? $_SESSION["user"]["user_id"] : NULL;
    }

    public function fullname()
    {
        return isset($_SESSION["user"]) ? $_SESSION["user"]["fullname"] : NULL;
    }

    public function email()
    {
        return isset($_SESSION["user"]) ? $_SESSION["user"]["email"] : NULL;
    }

    // Bool helper functions
    public function isAdmin()
    {
        return $this->isLoggedIn() && $_SESSION["user"]["role"] === "admin";
    }

    public function isLoggedIn()
    {
        return isset($_SESSION["user"]) && $_SESSION["user"]["loged_in"];
    }

    protected function view(string $file, $data = [])
    {
        extract($data);
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
