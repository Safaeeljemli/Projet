<?php

include('dbh.inc.php');
/* * *********** Reference ************** */
if (isset($_POST['archiveref'])) {
    try {
        $id = $_POST['idref'];
        $sql = "UPDATE reference SET statut=0 WHERE id=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);

// execute the query
        $stmt->execute();

// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:configuration.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

if (isset($_POST['unarchiveref'])) {
    try {
        $id = $_POST['idreef'];
        $sql = "UPDATE reference SET statut=1 WHERE id=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);

// execute the query
        $stmt->execute();

// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:archive.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
if (isset($_POST['editref'])) {
    try {
        $n = $_POST['nomref'];
        $c = $_POST['couleurref'];
        $id = $_POST['idref'];
        $dateMod = date('Y-m-d H:i:s');
        $idsession = $_POST['idsession'];
        echo '_-------------------------------';
        echo $idsession;
        $stmt = $conn->prepare('SELECT * FROM reference WHERE statut=1');
        $stmt->execute();
        $references = $stmt->fetchAll(PDO::FETCH_BOTH);
        foreach ($references as $reference) {
            if ($id == $reference['id']) {
                $type = "modification";
                $dateMod = date('Y-m-d H:i:s');
                if ($n != $reference['nom']) {
                    $nref = $reference['nom'];
                    $txtAn = "nomref= $nref";
                    $txtnew = "nomref= $n";
                }
                if ($c != $reference['couleur']) {
                    $couleref = $reference['couleur'];
                    $txtAn .= " couleur= $couleref";
                    $txtnew .= " couleur= $c";
                }
            }
        }

        $sql = "UPDATE reference SET nom='$n',couleur='$c' WHERE id=$id";
        $sql0 = "INSERT INTO journale (datemodification, newval, oldval, typedaction, page, iduser) VALUES ( '$dateMod','$txtAn', '$txtnew','$type','reference', '$idsession')";


// Prepare statement
        $stmts = $conn->prepare($sql0);

// Prepare statement
        $stmt = $conn->prepare($sql);

// execute the query
        $stmt->execute();
        $stmts->execute();
// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:configuration.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
//********************************************user *******************

if (isset($_POST['edituser'])) {
    try {
        $id = $_POST['id'];
        $nomComplet = $_POST['nomuser'];
        $username = $_POST['username'];
        $emailuser = $_POST['emailuser'];
        $typeuser = $_POST['typeuser'];
        $teluser = $_POST['teluser'];
        $adminuser = $_POST['adminuser'];
        $sql = "UPDATE users SET username='$username',email='$emailuser',type='$typeuser',nom_complet='$nomComplet',tel='$teluser',admin='$adminuser' WHERE id=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);

// execute the query
        $stmt->execute();

// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:admin1.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

/* * ****** Types chambre ********* */
if (isset($_POST['archivetypech'])) {
    try {
        $id = $_POST['idtch'];
        $sql = "UPDATE typechambre SET statut=0 WHERE idTc=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);

// execute the query
        $stmt->execute();

// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:configuration.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

if (isset($_POST['edittypech'])) {
    try {
        $n = $_POST['typech'];
        // $nc = $_POST['nbch'];
        $np = $_POST['nbpx'];
        $id = $_POST['idtch'];

        $dateMod = date('Y-m-d H:i:s');
        $idsession = $_POST['idsession'];
        $stmt = $conn->prepare('SELECT * FROM typechambre WHERE statut=1');
        $stmt->execute();
        $typechambres = $stmt->fetchAll(PDO::FETCH_BOTH);
        foreach ($typechambres as $typechambre) {
            echo '-------';
            echo $id;
            $rrr = $typechambre['idTc'];
            echo $rrr;
            if ($id == $typechambre['idTc']) {
                $type = "modification";
                $dateMod = date('Y-m-d H:i:s');
                if ($n != $typechambre['type']) {
                    $typ = $typechambre['nom'];
                    $txtAn = "type= $typ";
                    $txtnew = "type= $n";
                }
                if ($np != $typechambre['nbreMaxPax']) {
                    $npn = $typechambre['nbreMaxPax'];
                    $txtAn .= " nbr pax= $npn";
                    $txtnew .= " nbr pax= $np";
                }
            }
        }


        $sql0 = "INSERT INTO journale (datemodification, newval, oldval, typedaction, page, iduser) VALUES ( '$dateMod','$txtAn', '$txtnew','$type','typechambre', '$idsession')";



        $sql = "UPDATE typechambre SET type='$n',nbreMaxPax='$np' WHERE idTc=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);
        $stmts = $conn->prepare($sql0);

// execute the query
        $stmt->execute();
        $stmts->execute();
// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:configuration.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

/* * **********Type Reservation ************* */
if (isset($_POST['edittyperes'])) {
    try {
        $n = $_POST['typeres'];
        $id = $_POST['idtypere'];
        $coul = $_POST['coultypere'];
        $dateMod = date('Y-m-d H:i:s');
        $idsession = $_POST['idsession'];
        echo '_-------------------------------';
        echo $idsession;
        $stmt = $conn->prepare('SELECT * FROM typereservation WHERE statut=1');
        $stmt->execute();
        $typereservations = $stmt->fetchAll(PDO::FETCH_BOTH);
        foreach ($typereservations as $typereservation) {
            if ($id == $typereservation['id']) {
                $type = "modification";
                $dateMod = date('Y-m-d H:i:s');
                if ($n != $typereservation['type']) {
                    $nref = $typereservation['type'];
                    $txtAn = "type= $nref";
                    $txtnew = "type= $n";
                }
                if ($c != $typereservation['couleur']) {
                    $couleres = $typereservation['couleur'];
                    $txtAn .= " couleur= $couleres";
                    $txtnew .= " couleur= $c";
                }
            }
        }


        $sql0 = "INSERT INTO journale (datemodification, newval, oldval, typedaction, page, iduser) VALUES ( '$dateMod','$txtAn', '$txtnew','$type','typereservation', '$idsession')";



        $sql = "UPDATE typereservation SET type='$n', couleur='$coul' WHERE id=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);
        $stmts = $conn->prepare($sql0);
// execute the query
        $stmt->execute();
        $stmts->execute();
// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:configuration.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


if (isset($_POST['editcli'])) {
    try {
        $n = $_POST['nomcli'];
        $p = $_POST['prenomcli'];
        $age = $_POST['agecli'];
        $s = $_POST['sexe'];
        $pi = $_POST['pieceidcli'];
        $tel = $_POST['telcli'];
        $e = $_POST['emailcli'];
        $sf = $_POST['situationf'];
        $natio = $_POST['nationalite'];
        $id = $_POST['idcl'];
        $idsession = $_POST['idsession'];
        echo $_SESSION['userId'];

        echo $idsession;
        $stmt = $conn->prepare('SELECT * FROM clients WHERE statut=1');
        $stmt->execute();
        $clients = $stmt->fetchAll(PDO::FETCH_BOTH);
        foreach ($clients as $client) {
            if ($id == $client['idClient']) {
                $type = "modification";
                $dateMod = date('Y-m-d H:i:s');
                if ($n != $client['nom']) {
                    $nj = $client['nom'];
                    $txtAn = "nom= $nj";
                    $txtnew = "nom= $n";
                }
                if ($p != $client['prenom']) {
                    $pnj = $client['prenom'];
                    $txtAn .= " prenom= $pnj";
                    $txtnew .= " prenom= $p";
                }
                if ($age != $client['age']) {
                    $agej = $client['age'];
                    $txtAn .= " age= $agej";
                    $txtnew .= " age= $age";
                }
                if ($s != $client['sexe']) {
                    $sn = $client['sexe'];
                    $txtAn = "sexe= $sn";
                    $txtnew = "sexe= $s";
                }
                if ($pi != $client['pieceIdentite']) {
                    $pin = $client['pieceIdentite'];
                    $txtAn .= " cin= $pin";
                    $txtnew .= " cin= $pi";
                }
                if ($tel != $client['numTel']) {
                    $teln = $client['numTel'];
                    $txtAn .= " tel= $teln";
                    $txtnew .= " tel= $tel";
                }
                if ($natio != $client['nationalite']) {
                    $nation = $client['nationalite'];
                    $txtAn .= " nationalité= $nation";
                    $txtnew .= " nationalité= $natio";
                }
                if ($e != $client['email']) {
                    $en = $client['email'];
                    $txtAn .= " email= $en";
                    $txtnew .= " email= $e";
                }
                if ($sf != $client['situationFamiliale']) {
                    $sfn = $client['situationFamiliale'];
                    $txtAn .= " age= $sfn";
                    $txtnew .= " age= $sf";
                }
            }
        }

        $sql0 = "INSERT INTO journale (datemodification, newval, oldval, typedaction, page, iduser) VALUES ( '$dateMod','$txtAn', '$txtnew','$type','client', '$idsession')";
        $sql = "UPDATE clients SET nom='$n', prenom='$p', nationalite='$natio' ,age='$age', sexe='$s', numTel=$tel, email='$e', situationFamiliale='$sf', pieceIdentite='$pi' WHERE idClient=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);
        $stmts = $conn->prepare($sql0);
// execute the query
        $stmt->execute();
        $stmts->execute();

// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:clients.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

if (isset($_POST['editcha'])) {
    try {
        $n = $_POST['nomcodecha'];
        $p = $_POST['descriptifcha'];
        $c = $_POST['capacitecham'];
        $t = $_POST['typechamee'];
        $id = $_POST['idch'];

        $chb = array();
        $stmts = $conn->prepare('select * from chambre where statut=1');
        $stmts->execute();
        $chb = $stmts->fetchAll(PDO::FETCH_BOTH);
        foreach ($chb as $ch) {
            echo $ch['idChambre'];


            echo $id;

            if ($ch['idChambre'] == $id) {
                $oldid = $ch['idtypechambre'];
                echo '------------------------if--------------';

                echo $ch['idtypechambre'];
                echo '**********************************';

                echo $oldid;

                break;
            }
        }
        $sql = "UPDATE chambre SET nomCode='$n', descriptif='$p',capacity='$c', idtypechambre='$t' WHERE idChambre=$id";
        $sql1 = "UPDATE `typechambre` SET `nbrChambre`=nbrChambre-1 WHERE idTc=$oldid";
        $sql2 = "UPDATE `typechambre` SET `nbrChambre`=nbrChambre+1 WHERE idTc=$t";

// Prepare statement
        $stmt = $conn->prepare($sql);
        $stmt1 = $conn->prepare($sql1);
        $stmt2 = $conn->prepare($sql2);


// execute the query
        $stmt->execute();
        $stmt1->execute();
        $stmt2->execute();

// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:configuration.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
if (isset($_POST['unarchivecha'])) {
    try {
        $id = $_POST['idcha'];
        $sql = "UPDATE chambre SET statut=1 WHERE idChambre=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);

// execute the query
        $stmt->execute();

// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:archive.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
?>