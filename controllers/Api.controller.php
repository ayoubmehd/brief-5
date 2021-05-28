<?php


/**
 * This file need to be refactored - split code to different controller
 * 
 */
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

    // Crud Matiere
    public function matiere_all()
    {
        $obj = new Matiere();
        $obj->query("SELECT * FROM matiere");


        echo json_encode(["data" => $obj->result]);
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


    // Crud Salle
    public function salle_all()
    {
        $obj = new Salle();
        $obj->query("SELECT * FROM salle");


        echo json_encode(["data" => $obj->result]);
    }

    public function salle_aviable()
    {
        if (!isset($_GET["jour"])) {
            echo json_encode(["data" => null, "error" => "entrer le jour de la seance"]);
            return;
        }
        if (!isset($_GET["de"])) {
            echo json_encode(["data" => null, "error" => "entrer l'heur de seance"]);
            return;
        }
        if (!isset($_GET["a"])) {
            echo json_encode(["data" => null, "error" => "entrer l'heur de seance"]);
            return;
        }

        $jour = $_GET["jour"];
        $de = $_GET["de"];
        $a = $_GET["a"];
        $obj = new Salle();
        // $obj->query("SELECT * FROM salle WHERE id NOT IN (SELECT Salle_id FROM suiver WHERE jour = $jour AND de = '$de')");
        $sql = "SELECT * FROM salle WHERE salle.id NOT IN (SELECT Salle_id FROM suiver WHERE jour = ? AND (de <= ? AND a > ? OR de <= ? AND a > ?))";
        $obj->query($sql, [$jour, $de, $de, $a, $a]);

        echo json_encode(["data" => $obj->result]);
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


    // Crud Salle
    public function suiver_all()
    {
        $obj = new Suiver();
        $where = !$this->isAdmin() ? "WHERE Ensegniant_id = ?" : "";
        $sql = "SELECT suiver.id, ensegniant.id as \"ensegniant_id\", ensegniant.nom as \"ensegniant_nom\", groupe.id as \"groupe_id\", groupe.libelle as \"groupe_libelle\", salle.id as \"salle_id\", salle.libelle as \"salle_libelle\", jour, de, a FROM suiver INNER JOIN ensegniant ON ensegniant.id = suiver.Ensegniant_id INNER JOIN groupe ON suiver.Groupe_id = groupe.id INNER JOIN salle ON salle.id = suiver.Salle_id $where";
        $obj->query($sql, !$this->isAdmin() ? [$this->ensegniant_id()] : []);


        echo json_encode(["data" => $obj->result]);
    }

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

    public function ensegniant_all()
    {
        $obj = new Suiver();
        $obj->query("SELECT * FROM ensegniant");

        echo json_encode(["data" => $obj->result]);
    }
}
