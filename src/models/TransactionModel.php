<?php
namespace Bank\Models;
class TransactionModel{
    
    public function findByComptesId(int $idc,string $type=""){
        var_dump($idc);
        $sql="SELECT * FROM transaction WHERE idc='$idc'";
        if($type!=""){
            $sql.=" AND type='$type'";
            }
        $pdo=new \PDO('mysql:host=localhost;dbname=demophp;charset=utf8',"root","");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
         $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        $result=$pdo->query($sql);
        return $result->fetchAll();

    }
  
    public function addTransaction(array $data1,array $data2){
        $op=$_POST["type"]=="depot"?"+":"-";
        $sql1 = "INSERT INTO transaction (montant,type, datet, idc) VALUES (:montant, :type, :datet, :idc)";
         $sql2 ="UPDATE `compte` SET `solde` = `solde`".$op.":montant WHERE `compte`.`idc` = :idc";
          
            try {
                  $pdo=new \PDO('mysql:host=localhost;dbname=demophp;charset=utf8',"root","");
                $pdo->beginTransaction();
                // Insertion dans la table Transaction
                $stmt1= $pdo->prepare($sql1);
                $stmt1->execute($data1);
                // Mis a jour de la solde du compte
                $stmt2= $pdo->prepare($sql2);
                $stmt2->execute($data2);
                $pdo->commit();
            } catch (\PDOException $e) {
                $pdo->rollBack();
                die('Transaction échouée : ' . $e->getMessage());
            }
        
            
        }
    }