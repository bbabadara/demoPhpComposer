<?php
namespace Bank\Models;
class TypeCompteModel{

    public function findAll(){
        $sql="SELECT * FROM typecompte ";
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp1;charset=utf8',"root","");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
         $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        $result=$pdo->query($sql);
        return $result->fetchAll();
    }
  
 

    public function addtypeCompte(array $data){
        $sql = "INSERT INTO typecompte (libtc) VALUES (:libtc)";
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp1;charset=utf8',"root","");
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
    }
    
        
    }
