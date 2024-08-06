<?php
namespace Bank\Models;
class CompteModel{

    public function findByTelephone(string $tel){
        $sql="SELECT * FROM client cl JOIN compte c on cl.idcl=c.idcl JOIN typecompte tc ON c.idtc = tc.idtc WHERE cl.telephone ='$tel'";
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp1;charset=utf8',"root","");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
         $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        $result=$pdo->query($sql);
        return $result->fetchAll();
    }
    public function findByID(string $id){
        $sql="SELECT * FROM client cl JOIN compte c ON cl.idcl = c.idcl JOIN typecompte tc ON c.idtc = tc.idtc WHERE c.idc = '$id'";
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp1;charset=utf8',"root","");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
         $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        $result=$pdo->query($sql);
        return $result->fetch();
    }
    public function findBynumero(string $numero){
        $sql="SELECT * FROM compte JOIN typecompte tc ON c.idtc = tc.idtc WHERE numero ='$numero'";
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp1;charset=utf8',"root","");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
         $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        $result=$pdo->query($sql);
        return $result->fetch();
    }

    public function addCompte(array $data){
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp1;charset=utf8',"root","");
        $sql = "INSERT INTO compte (numero, solde,idcl) VALUES (:numero, :solde, :idcl)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
    }
    public function addCompteTransaction(array $data1,array $data2){
        $sql1 = "INSERT INTO client (nom, prenom, telephone) VALUES (:nom, :prenom, :telephone)";
        $sql2 = "INSERT INTO compte (numero, solde,idcl) VALUES (:numero, :solde, :idcl)";
      
        try {
              $pdo=new \PDO('mysql:host=localhost;dbname=demophp1;charset=utf8',"root","");
            $pdo->beginTransaction();
            // Insertion dans la table client
            $stmt1= $pdo->prepare($sql1);
            $stmt1->execute($data1);
            // Insertion dans la table compte
            $stmt2= $pdo->prepare($sql2);
            $data2["idcl"]=$pdo->lastInsertId();
            $stmt2->execute($data2);
            $pdo->commit();
        } catch (\PDOException $e) {
            $pdo->rollBack();
            die('Transaction échouée : ' . $e->getMessage());
        }
    
        
    }
}