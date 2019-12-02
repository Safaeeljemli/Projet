<?php 
require_once 'dbh.inc.php';
    if(isset($_POST["ref"]))
    {
        try {
                $stmt = $conn->prepare("INSERT INTO `clients` (`nom`, `prenom`, `age`, `sexe`, `pieceIdentite`, `numTel`, `email`, `situationFamiliale` ,`statut`) 
                VALUES (:nom, :prenom, :sexe, :id, :tel, :email, :situation);");
                $stmt->bindParam(':nom', $_POST['nom']);
                $stmt->bindParam(':prenom', $_POST['prenom']);
                $stmt->bindParam(':age', $_POST['age']);
                 $stmt->bindParam(':sexe', $_POST['sexe']);
                $stmt->bindParam(':id', $_POST['id']);
                $stmt->bindParam(':tel', $_POST['tel']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':situation', $_POST['situation']);
                $stmt->execute();
                 $last_client = $conn->lastInsertId();
                if(!empty($_POST["nomMS"]) && !empty($_POST["cin"]))
                {
                    $nomMS=$_POST["nomMS"]." ".$_POST["prenomMS"];
                    $cin=$_POST["cin"];
                    $cin=$_POST["cin"];
                    $stmt2 = $conn->prepare("INSERT INTO `accompagnant` (`idClient`,`cin` ,`nom`, `age` `categorie`) 
                            VALUES ('$last_client', '$nomMS.', '$prenomMS','Adult')");
                    $stmt2->execute();
                   
                }
                $i=0;
                if(!empty($_POST["nom1"]))
                    {
                        for($i=1;$i<=8;$i++)
                        { 
                            if(!empty($_POST["nom".$i]))
                            {
                                $nomAC= $_POST["nom".$i]; 
                                $ageAC= $_POST["age".$i]; 
                                $categorieAC= $_POST["categorie".$i]; 
                                
                                
                                if(!empty($_POST["id".$i]))
                                {
                                    $idAC=$_POST["id".$i];

                                }else{
                                    $idAC="Null";
                                }

                                $categorie= $_POST["nom".$i];     
                                //accompaghant 
                                $nbrAC=$i;
                                $stmt3 = $conn->prepare("INSERT INTO `accompagnant` (`idClient`,`cin`, `nom`, `age` ,`categorie`) 
                                VALUES ('$last_client','$idAC', '$nomAC', '$ageAC', '$categorieAC')");
                                $stmt3->execute();
                            }
                              
                        }
                    }

                //reservation
                $code='R'.$_POST['id']."_".$_POST['dated'].rand(0,9);
                                                
                $nomClient=$_POST['nom'];
                $dated=$_POST['dated'];
                $datef=$_POST['datef'];
                $today = date("Y-m-d H:i:s");
                $nbrNuit=$_POST['nbrNuit'];
                $type_res=$_POST['situation'];
                $chambre=$_POST['chambre'];
                $ref=$_POST['ref'];
                $stmt4 = $conn->prepare("INSERT INTO `reservations`(`code`, `id_client`, `name`, `dateRes`, `start`, `end`,
                `nbreNuits`, `idReference`, `idChambre`, `nbrAccompagnant`, `type_res`, `status`, `paid`) 
                VALUES ('$code', '$last_client', '$nomClient', '$today', '$dated', '$datef','$nbrNuit', '$ref', '$chambre', '$i', '$type_res', 'New', '100');");
                $stmt4->execute();
                echo 'merci';


              
            }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }
    
    }

?>