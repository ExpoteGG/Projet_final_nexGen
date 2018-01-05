<?php

class ChambresDB {

    private $_db;
    private $_typeArray = array();

    public function __construct(array $cnx) {
        $this->_db = $cnx;
    }

    public function getChambres() {
        try {
            $query = "SELECT * FROM CHAMBRE ORDER BY ID_CHAMBRE";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_typeArray[] = new voyages($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
    }

    public function update_status($data) {
        $query = "UPDATE chambre SET status=0 WHERE id_chambre=:id";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $data, PDO::PARAM_STR);

            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de la mise à jour";
            print $e->getMessage();
        }
    }
}
