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

    public function add_groups()
    {
        $this->view("multi_add_groupe");
    }

    public function matiere()
    {
        $obj = new Matiere();
        $obj->query("SELECT * FROM matiere");


        $this->view("matiere", ["data" => $obj->result]);
    }

    public function salle()
    {
        $obj = new Salle();
        $obj->query("SELECT * FROM salle");

        $this->view("salle", ["data" => $obj->result]);
    }


    public function suiver()
    {
        $obj = new Suiver();
        $obj->query("SELECT * FROM suiver");

        $this->view("suiver", ["data" => $obj->result]);
    }

    public function add_suiver()
    {
        $this->view("add_suiver");
    }

    public function profile()
    {
        $id = $this->userid();

        $obj = new Ensegniant();
        $obj->query("SELECT * FROM ensegniant INNER JOIN matiere ON matiere.id = ensegniant.Matiere_id WHERE ensegniant.id IN (SELECT Ensegniant_id FROM user WHERE id = $id)");

        $mat = new Matiere();
        $mat->query("SELECT * FROM matiere");

        $this->view("profile", [
            "data" => $obj->result,
            "matiere" => $mat->result
        ]);
    }
}
