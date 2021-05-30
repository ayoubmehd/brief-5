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
        if (!$this->isAdmin()) {
            echo json_encode(["error" => "Only admin have access to this page"]);
            return;
        }

        $group = new Group();
        $group->query("SELECT * FROM groupe");


        echo json_encode(["data" => $group->result]);
    }

    // Crud Matiere
    public function matiere_all()
    {
        if (!$this->isAdmin()) {
            echo json_encode(["error" => "Only admin have access to this page"]);
            return;
        }
        $obj = new Matiere();
        $obj->query("SELECT * FROM matiere");


        echo json_encode(["data" => $obj->result]);
    }



    // Crud Salle
    public function salle_all()
    {
        if (!$this->isAdmin()) {
            echo json_encode(["error" => "Only admin have access to this page"]);
            return;
        }
        $obj = new Salle();
        $obj->query("SELECT * FROM salle");


        echo json_encode(["data" => $obj->result]);
    }

    public function salle_aviable()
    {
        if (!$this->isLoggedIn()) {
            echo json_encode(["error" => "You need to login to access to this ressource"]);
            return;
        }
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
        // $sql = "SELECT * FROM salle WHERE salle.id NOT IN (SELECT Salle_id FROM suiver WHERE jour = ? AND (de <= ? AND a > ? OR de <= ? AND a > ?))";
        $obj->get_salle_aviable($jour, $de, $a);

        echo json_encode(["data" => $obj->result]);
    }


    // Crud Salle
    public function suiver_all()
    {
        if (!$this->isLoggedIn()) {
            echo json_encode(["error" => "You need to login to access to this ressource"]);
            return;
        }
        $obj = new Suiver();
        $where = !$this->isAdmin() ? "WHERE Ensegniant_id = ?" : "";
        $sql = "SELECT suiver.id, ensegniant.id as \"ensegniant_id\", ensegniant.nom as \"ensegniant_nom\", groupe.id as \"groupe_id\", groupe.libelle as \"groupe_libelle\", salle.id as \"salle_id\", salle.libelle as \"salle_libelle\", jour, de, a FROM suiver INNER JOIN ensegniant ON ensegniant.id = suiver.Ensegniant_id INNER JOIN groupe ON suiver.Groupe_id = groupe.id INNER JOIN salle ON salle.id = suiver.Salle_id $where";
        $obj->query($sql, !$this->isAdmin() ? [$this->ensegniant_id()] : []);


        echo json_encode(["data" => $obj->result]);
    }


    public function ensegniant_all()
    {
        if ($this->isAdmin()) {
            echo json_encode(["error" => "Only admin have access to this page"]);
            return;
        }
        $obj = new Suiver();
        $obj->query("SELECT * FROM ensegniant");

        echo json_encode(["data" => $obj->result]);
    }
}
