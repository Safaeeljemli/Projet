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
        $sql = "UPDATE reference SET nom='$n',couleur='$c' WHERE id=$id";

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
        $nc = $_POST['nbch'];
        $np = $_POST['nbpx'];
        $id = $_POST['idtch'];
        $sql = "UPDATE typechambre SET type='$n',nbreChambre=$nc,nbreMaxPax=$np WHERE idTc=$id";

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

/* * **********Type Reservation ************* */
if (isset($_POST['edittyperes'])) {
    try {
        $n = $_POST['typeres'];
        $id = $_POST['idtypere'];
        $coul = $_POST['coultypere'];
        $sql = "UPDATE typereservation SET type='$n', couleur='$coul' WHERE id=$id";

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
        $id = $_POST['idcl'];
        $sql = "UPDATE clients SET nom='$n', prenom='$p', age='$age', sexe='$s', numTel=$tel, email='$e', situationFamiliale='$sf', pieceIdentite='$pi' WHERE idClient=$id";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();

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
           
            if ( $ch['idChambre'] == $id) {
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
?>