<?php
class Vue_chambresDB{
    private $_db;
    function __construct($_db){
        $this->_db = $_db;
    }
    
    //liste des voyages par id
    function getVue_chambresType($id){
        try{
            $query = "SELECT * FROM chambre WHERE ID_CHAMBRE=:id_chambre";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_chambre',$id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){
            try{
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    
    function getVue_chambres(){
        try{
            $query = "SELECT * FROM chambre ORDER BY ID_CHAMBRE";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){
            try{
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    
    function getVue_chambresSelect($id){
        try{
            $query = "SELECT * FROM chambre where id_chambre=:id_chambre";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_chambre',$id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        while($data = $resultset->fetch()){
            try{
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    
    
    public function update_status($data) {
        $query = "UPDATE chambre SET status=0 WHERE id_chambre=:id";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id',$data, PDO::PARAM_STR);
            
            $resultset->execute();

        }catch(PDOException $e){
            print "<br/>Echec de la mise à jour";
            print $e->getMessage();
        }        
    }
    
    
    public function delete_chambre($data){
        $query = "DELETE FROM chambre WHERE id_chambre=:id";
        
        try{
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id',$data, PDO::PARAM_STR);
            
            $resultset->execute();
            
       } catch (Exception $e) {
           print "<br/>Echec de la suppression";
           print $e->getMessage();
        }
    }
    
    public function addChambre(array $data){
        print_r($data);
        $query = "insert into chambre(nom,description,place,date,prix,status)"
                ."values (:nom_chambre,:description_chambre,:place_chambre,:date_chambre,prix_chambre,status_chambre)";
        try{
            $resultset = $this->_db->prepare($query);
            $resultset->bindvalue('nom_chambre',$data['name'], PDO::PARAM_STR);
            $resultset->bindvalue('description_chambre',$data['description'], PDO::PARAM_STR);
            $resultset->bindvalue('place_chambre',$data['place'], PDO::PARAM_STR);
            $resultset->bindvalue('date_chambre',$data['date'], PDO::PARAM_STR);
            $resultset->bindvalue('prix_chambre',$data['prix'], PDO::PARAM_STR);
            $resultset->bindvalue('status_chambre',$data['status'], PDO::PARAM_STR);
            
            $resultset->execute();
        } catch (PDOException $ex) {
            print "<br/>Echec de l'insertion";
            print $ex->getMessage();
        }
    }
}

