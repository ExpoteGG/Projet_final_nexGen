<?php

class ContactDB{
    private $_db;
    private $_contactArray = array();
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function addContact(array $data){
        
        $query = "insert into contact(nom,email,subject,message)"
                ."values (:nom_contact,:email_contact,:subject_contact,:message_contact)";
        try{
            $resultset = $this->_db->prepare($query);
            $resultset->bindvalue('nom_contact',$data['name'], PDO::PARAM_STR);
            $resultset->bindvalue('email_contact',$data['email'], PDO::PARAM_STR);
            $resultset->bindvalue('subject_contact',$data['subject'], PDO::PARAM_STR);
            $resultset->bindvalue('message_contact',$data['message'], PDO::PARAM_STR);
            
            $resultset->execute();
        } catch (PDOException $ex) {
            print "<br/>Echec de l'insertion";
            print $ex->getMessage();
        }
    }
    
    function getAllContact(){
        try{
            $query = "SELECT * FROM contact ORDER BY NOM";
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
}