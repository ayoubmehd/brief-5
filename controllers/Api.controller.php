<?php

class ApiController extends AbstructController
{


    // Crud Group
    public function group_all()
    {
        $group = new Group();
        $group->query("SELECT * FROM groupe");


        echo json_encode(["data" => $group->result]);
    }

    public function add_group()
    {
        if (!isset($_POST["add"])) return;

        $effectif = $_POST["effectif"];
        $group = new Group();
        $group->insert([
            "effecrif" => $effectif
        ]);

        return $this->redirect("/dashboard/group");
    }

    public function delete_group($id)
    {
        $group = new Group();
        $group->delete("id = $id");

        return $this->redirect("/dashboard/group");
    }

    public function edit_group($id)
    {
        if (!isset($_POST["edit"])) return;

        $effectif = $_POST["effectif"];
        $group = new Group();
        $group->update([
            "effecrif" => $effectif
        ], "id = $id");

        return $this->redirect("/dashboard/group");
    }


    // Crud Group
    public function matiere_all()
    {
        $obj = new Matiere();
        $obj->query("SELECT * FROM matiere");


        echo json_encode(["data" => $obj->result]);
    }

    public function add_matiere()
    {
        if (!isset($_POST["add"])) return;

        $Matiere_label = $_POST["Matiere_label"];
        $obj = new Matiere();
        $obj->insert([
            "Matiere_label" => $Matiere_label
        ]);

        return $this->redirect("/dashboard/matiere");
    }

    public function delete_matiere($id)
    {
        $obj = new Matiere();
        $obj->delete("id = $id");

        return $this->redirect("/dashboard/matiere");
    }

    public function edit_matiere($id)
    {
        if (!isset($_POST["edit"])) return;

        $Matiere_label = $_POST["Matiere_label"];
        $obj = new Matiere();
        $obj->update([
            "Matiere_label" => $Matiere_label
        ], "id = $id");

        return $this->redirect("/dashboard/matiere");
    }
}
