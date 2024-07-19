<?php
namespace Bank\Models;
class ClientModel{
    
    public function findByTelephone(string $tel){
        $sql="SELECT * FROM client WHERE telephone ='$tel'";
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp;charset=utf8',"root","");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
         $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        $result=$pdo->query($sql);
        // var_dump($result->fetchAll(\PDO::FETCH_CLASS,CompteModel::class));
        return $result->fetch();
    }
  
    public function addClient(array $data){
        $sql = "INSERT INTO client (nom, prenom, telephone) VALUES (:nom, :prenom, :telephone)";
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp;charset=utf8',"root","");
            $stmt= $pdo->prepare($sql);
            $stmt->execute($data);
            return $pdo->lastInsertId();
    
    }
}