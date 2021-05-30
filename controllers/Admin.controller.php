<?php

class AdminController extends AbstructController
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


    public function add_matiere()
    {
        if (!isset($_POST["add"]))
            return $this->redirect("/dashboard/matiere");
        if (!isset($_POST["Matiere_label"]))
            return $this->redirect("/dashboard/matiere");
        if (empty($_POST["Matiere_label"]))
            return $this->redirect("/dashboard/matiere");

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
        if (!isset($_POST["edit"])) return $this->redirect("/dashboard/matiere");
        if (!isset($_POST["Matiere_label"])) return $this->redirect("/dashboard/matiere");
        if (empty($_POST["Matiere_label"])) return $this->redirect("/dashboard/matiere");

        $Matiere_label = $_POST["Matiere_label"];
        $obj = new Matiere();
        $obj->update([
            "Matiere_label" => $Matiere_label
        ], ["id" => $id]);

        return $this->redirect("/dashboard/matiere");
    }


    public function add_salle()
    {
        if (!isset($_POST["add"])) return $this->redirect("/dashboard/salle");
        if (!isset($_POST["libelle"])) return $this->redirect("/dashboard/salle");
        if (!isset($_POST["capacite"])) return $this->redirect("/dashboard/salle");

        $libelle = $_POST["libelle"];
        $capacite = $_POST["capacite"];
        $obj = new Salle();
        $obj->insert([
            "libelle" => $libelle,
            "capacite" => $capacite,
        ]);

        return $this->redirect("/dashboard/salle");
    }

    public function delete_salle($id)
    {
        $obj = new Salle();
        $obj->delete("id = $id");

        return $this->redirect("/dashboard/salle");
    }

    public function edit_salle($id)
    {
        if (!isset($_POST["edit"])) return $this->redirect("/dashboard/salle");
        if (!isset($_POST["libelle"])) return $this->redirect("/dashboard/salle");
        if (!isset($_POST["capacite"])) return $this->redirect("/dashboard/salle");

        $libelle = $_POST["libelle"];
        $capacite = $_POST["capacite"];
        $obj = new Salle();

        $obj->update([
            "libelle" => $libelle,
            "capacite" => $capacite,
        ], ["id" => $id]);

        return $this->redirect("/dashboard/salle");
    }
}
