<?php

class Salle extends Abstruct
{
    public static $table = "salle";

    public function get_salle_aviable($jour, $de, $a)
    {
        $sql = "SELECT * FROM salle WHERE salle.id NOT IN (SELECT Salle_id FROM suiver WHERE jour = :jour AND ((:de >= de AND :de < a) OR (:a >= de AND :a < a) OR (de >= :de AND de < :a) OR (a >= :de AND a < :a)))";
        $sth = $this->cnx->prepare($sql);
        $sth->bindParam(":jour", $jour, PDO::PARAM_INT);
        $sth->bindParam(":de", $de, PDO::PARAM_STR);
        $sth->bindParam(":a", $a, PDO::PARAM_STR);

        $sth->execute();
        $this->result = $sth->fetchAll(PDO::FETCH_ASSOC);
        $this->errors = $sth->errorInfo();
    }
}
