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
        $obj = new Group();
        $obj->query("SELECT * FROM groupe");


        $this->view("group", ["data" => $obj->result]);
    }

    public function matiere()
    {
        $obj = new Matiere();
        $obj->query("SELECT * FROM matiere");


        $this->view("matiere", ["data" => $obj->result]);
    }
}
