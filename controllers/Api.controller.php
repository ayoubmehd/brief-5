<?php

class ApiController extends AbstructController
{

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
}
