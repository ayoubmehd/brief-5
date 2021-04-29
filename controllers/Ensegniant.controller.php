<?php

class EnsegniantController extends AbstructController
{

    public function index()
    {
        $id = $this->userid();
        $user = new User();
        $user->query("SELECT Ensegniant_id FROM user WHERE Ensegniant_id IS NOT NULL AND id = $id");
        // var_dump(count($user->result));
        if (count($user->result) === 1) {
            $this->update($user->result[0]["Ensegniant_id"]);
        } else {
            $this->create();
        }
    }

    private function create()
    {

        $id = $this->userid();

        $obj = new Ensegniant();
        $nom = $_POST["nom"];
        $prenome = $_POST["prenom"];
        $Matiere_id = $_POST["matiere"];
        $obj->insert([
            "nom" => $nom,
            "prenom" => $prenome,
            "Matiere_id" => $Matiere_id,
        ]);

        $user = new User();
        $user->update(
            ["Ensegniant_id" => $obj->getLastInsertId()],
            ["id" => $id]
        );
        $this->redirect("/dashboard/profile");
    }

    private function update($Ensegniant_id)
    {

        $obj = new Ensegniant();
        $nom = $_POST["nom"];
        $prenome = $_POST["prenom"];
        $Matiere_id = $_POST["matiere"];
        $obj->update([
            "nom" => $nom,
            "prenom" => $prenome,
            "Matiere_id" => $Matiere_id,
        ], ["id" => $Ensegniant_id]);

        $this->redirect("/dashboard/profile");
    }
}
