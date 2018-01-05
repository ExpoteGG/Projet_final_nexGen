<?php

class ClientDB extends Client{
    private $_db;
    private $_clientArray = Array();
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getClient($email){
        $query="select * from utilisateur where email_client=:email_client";
        try{
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email_client',$email, PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){
            try{
                $_clientArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_clientArray;
    }
    
    public function addClient(array $data){
        print_r($data);
        $query = "insert into utilisateur(nom,prenom,mail,tel,rue,numero,codepostal,localite,nom_chambre)"
                ."values (:nom_client,:prenom_client,:mail_client,:telephone,:rue_client,:numero,:codepostal,:localite,:nom_chambre)";
    
        try{
            $resultset = $this->_db->prepare($query);
            $resultset->bindvalue(':nom_client',$data['nom'], PDO::PARAM_STR);
            $resultset->bindvalue(':prenom_client',$data['prenom'], PDO::PARAM_STR);
            $resultset->bindvalue(':mail_client',$data['email1'], PDO::PARAM_STR);
            $resultset->bindvalue(':telephone',$data['telephone'], PDO::PARAM_STR);
            $resultset->bindvalue(':rue_client',$data['rue_client'], PDO::PARAM_STR);
            $resultset->bindvalue(':numero',$data['numero'], PDO::PARAM_STR);
            $resultset->bindvalue(':codepostal',$data['codepostal'], PDO::PARAM_STR);
            $resultset->bindvalue(':localite',$data['localite'], PDO::PARAM_STR);
            $resultset->bindvalue(':nom_chambre',$data['nom_chambre'], PDO::PARAM_STR);
            
            $resultset->execute();
            
            
           } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
    
}
