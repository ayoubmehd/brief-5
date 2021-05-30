<?php

class SuiverController extends AbstructController
{

    public function add_suiver()
    {
        if (!isset($_POST["add"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["Ensegniant_id"]) && $this->isAdmin()) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["Groupe_id"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["Salle_id"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["jour"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["de"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["a"])) return $this->redirect("/dashboard/suiver");

        $user = new User();
        $user->select(["Ensegniant_id"], ["id" => $this->userid()]);
        $currentUserEnsegniantId = isset($user->result[0]) ? $user->result[0]["Ensegniant_id"] : null;

        $Ensegniant_id = $this->isAdmin() ? $_POST["Ensegniant_id"] : $currentUserEnsegniantId;

        $Groupe_id = $_POST["Groupe_id"];
        $Salle_id = $_POST["Salle_id"];
        $jour = $_POST["jour"];
        $de = $_POST["de"];
        $a = $_POST["a"];
        $obj = new Suiver();

        $obj->insert([
            "Ensegniant_id" => $Ensegniant_id,
            "Groupe_id" => $Groupe_id,
            "Salle_id" => $Salle_id,
            "jour" => $jour,
            "de" => $de,
            "a" => $a,
        ]);

        return $this->redirect("/dashboard/suiver");
    }

    public function delete_suiver($id)
    {
        $obj = new Salle();
        $obj->delete("id = $id");

        return $this->redirect("/dashboard/salle");
    }

    public function edit_suiver($id)
    {
        if (!isset($_POST["edit"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["Ensegniant_id"]) && $this->isAdmin()) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["Groupe_id"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["Salle_id"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["jour"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["de"])) return $this->redirect("/dashboard/suiver");
        if (!isset($_POST["a"])) return $this->redirect("/dashboard/suiver");

        $user = new User();
        $user->select(["Ensegniant_id"], ["id" => $this->userid()]);
        $currentUserEnsegniantId = isset($user->result[0]) ? $user->result[0]["Ensegniant_id"] : null;

        $Ensegniant_id = $this->isAdmin() ? $_POST["Ensegniant_id"] : $currentUserEnsegniantId;
        $Groupe_id = $_POST["Groupe_id"];
        $Salle_id = $_POST["Salle_id"];
        $jour = $_POST["jour"];
        $de = $_POST["de"];
        $a = $_POST["a"];
        $obj = new Suiver();

        $obj->update([
            "Ensegniant_id" => $Ensegniant_id,
            "Groupe_id" => $Groupe_id,
            "Salle_id" => $Salle_id,
            "jour" => $jour,
            "de" => $de,
            "a" => $a
        ], ["id" => $id]);

        return $this->redirect("/dashboard/suiver");
    }
}
