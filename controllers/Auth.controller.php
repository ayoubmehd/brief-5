<?php

class AuthController extends AbstructController
{



    public $use_hash;
    public $user;

    function __construct($use_hash = true)
    {
        $this->use_hash = $use_hash;
        $this->user = new User();
        session_start();
    }

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

    // Session
    private function session()
    {
        $_SESSION["user"] = [
            "user_id"         =>  $this->user->result[0]["id"],
            "fullname"      => $this->user->result[0]["full_name"],
            "email"            => $this->user->result[0]["email"],
            "role"            => $this->user->result[0]["role"],
            "loged_in"      => true,
        ];
    }

    // User
    function fetchUser()
    {
        $userid = $this->userid();

        $this->user->select(["*"], ["id" => $userid]);
    }

    public function updateProfile()
    {
        if (!isset($_POST["update_profile"])) return;

        $userid = $this->userid();

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];

        if ($new_password === "") {
            $new_password = $old_password;
        }

        $this->user->select(
            ["*"],
            ["id" => $userid]
        );


        if (!$this->verify_password($old_password) && (string)$old_password === "") {
            return $this->redirect("/profile");
        }

        $this->user->update([
            "full_name" => $fullname,
            "email" => $email,
            "password" => $this->hash_password($new_password)
        ], "id = $userid");

        $this->fetchUser();
        $this->session();
        $this->redirect("/profile");
    }

    function verify_password($password)
    {
        return password_verify($password, $this->user->result[0]["password"]);
    }

    public function logout()
    {
        session_destroy();
        return $this->redirect("/login");
    }

    // Helpers
    private function errorHandling($redirect = "/login")
    {
        $isError = $this->user->errors[1] ? true : false;

        if ($isError) {
            $this->redirect($redirect);
        }
    }

    public function index()
    {
        echo "auth";
    }

    public function login()
    {

        $this->view("layout/header");
        $this->view("auth/login");
        $this->view("layout/footer");
    }

    public function register()
    {
        $this->view("layout/header");
        $this->view("auth/register");
        $this->view("layout/footer");
    }


    public function do_login()
    {

        if (!isset($_POST['login'])) return;

        $email = $_POST['email'];
        $password = $_POST['password'];

        $this->user = new User();

        $this->user->select(
            ["*"],
            ["email" => $email]
        );

        $this->errorHandling();

        // $isPasswordValid = $this->user->result[0]["password"] === $password;
        $isPasswordValid = $this->verify_password($password);

        if (!$isPasswordValid) {
            return $this->redirect("/auth/login");
        }

        $this->session();
        if ($this->user->result[0]["role"] === "admin") {
            return $this->redirect("/dashboard");
        }

        return $this->redirect("/dashboard");
    }

    public function do_register()
    {

        if (!isset($_POST['register'])) return;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $this->user  = new User();

        $this->user->insert([
            "username" => $username,
            "email" => $email,
            "password" => $this->hash_password($password),
            "role" => "user",
        ]);

        $this->errorHandling("/register");

        $this->redirect("/auth/login");
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
