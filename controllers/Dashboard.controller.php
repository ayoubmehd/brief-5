<?php

class DashboardController extends AbstructController
{

    public static $viewsDir = "dashboard/";


    public function view($view, $data = [])
    {
        parent::view(self::$viewsDir . "layout/header");
        parent::view(self::$viewsDir . "layout/sidebar");
        parent::view(self::$viewsDir . "layout/navbar");
        parent::view(self::$viewsDir . $view, $data);
        parent::view(self::$viewsDir . "layout/footer");
    }

    public function index()
    {
        $this->view("home");
    }

    public function group()
    {
        $group = new Group();
        $group->query("SELECT * FROM groupe");


        $this->view("group", ["data" => $group->result]);
    }
}
