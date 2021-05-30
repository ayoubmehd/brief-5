<?php

class GroupeController extends AbstructController
{
    public function add_group()
    {
        if (!isset($_POST["add"])) return $this->redirect("/dashboard/group");
        if (!isset($_POST["libelle"])) return $this->redirect("/dashboard/group");
        if (!isset($_POST["effectif"])) return $this->redirect("/dashboard/group");

        $libelle = $_POST["libelle"];
        $effectif = $_POST["effectif"];
        $group = new Group();
        $group->insert([
            "libelle" => $libelle,
            "effectif" => $effectif,
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
        if (!isset($_POST["edit"])) return $this->redirect("/dashboard/group");
        if (!isset($_POST["libelle"])) return $this->redirect("/dashboard/group");
        if (!isset($_POST["effectif"])) return $this->redirect("/dashboard/group");

        $libelle = $_POST["libelle"];
        $effectif = $_POST["effectif"];
        $group = new Group();
        $group->update([
            "libelle" => $libelle,
            "effectif" => $effectif,
        ], ["id" => $id]);

        return $this->redirect("/dashboard/group");
    }
}
