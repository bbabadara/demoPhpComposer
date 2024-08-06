<?php
namespace Bank\Models;
class TypeTransactionModel{
    
    public function findAll(){
        $sql="SELECT * FROM typetransaction";
       
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp1;charset=utf8',"root","");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
         $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        $result=$pdo->query($sql);
        return $result->fetchAll();
    }
  
    public function addTypeTransaction(array $data){
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp1;charset=utf8',"root","");
         $sql = "INSERT INTO typetransaction (libtt) VALUES (:libtt)";
         $stmt= $pdo->prepare($sql);
         $stmt->execute($data);
    }
}