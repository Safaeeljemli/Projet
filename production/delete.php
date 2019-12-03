<?php

include('dbh.inc.php');
/* * ******* References *********** */
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
        $id = $_POST['idre'];
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



// ++++++++++++ user
if (isset($_POST['archiveuser'])) {
    try {
        $id = $_POST['iduser'];
        $sql = "UPDATE users SET blocked=1 WHERE id=$id";
        echo $id;
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

if (isset($_POST['unarchiveuser'])) {
    try {
        $id = $_POST['iduser'];
        $sql = "UPDATE reference SET statut=1 WHERE id=$id";

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

if (isset($_POST['deleteref'])) {
    try {
        $id = $_POST['idre'];
        $sql = "DELETE FROM reference WHERE id=$id";

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


/* * *** Type Chambres ****** */
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

if (isset($_POST['unarchivetypech'])) {
    try {
        $id = $_POST['idtc'];
        $sql = "UPDATE typechambre SET statut=1 WHERE idTc=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);

// execute the query
        $stmt->execute();

// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:	archive.php');
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

if (isset($_POST['supptypech'])) {

    try {
        $id = $_POST['idtc'];
        if (typechambre['nbrChambre'] == 0) {
            try {
                $sql = "DELETE FROM typechambre WHERE idTc=$id";

// Prepare statement
                $stmt = $conn->prepare($sql);

// execute the query
                $stmt->execute();

// echo a message to say the UPDATE succeeded
                echo $stmt->rowCount() . " records UPDATED successfully";
                header('location:archive.php');
            } catch (Exception $ex) {
                
            }
        } else {
            echo("errooooooooooor");
        }
        header('location:archive.php');
    } catch (PDOException $e) {
        echo "Impossible de supprimer" . $e->getMessage();
    }
}



/* * ******* Types Reservation ******* */
if (isset($_POST['archivetyperes'])) {
    try {
        $id = $_POST['idtypere'];
        $sql = "UPDATE typereservation SET statut=0 WHERE id=$id";

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

if (isset($_POST['unarchivetyperes'])) {
    try {
        $id = $_POST['idtyperes'];
        $sql = "UPDATE typereservation SET statut=1 WHERE id=$id";

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


if (isset($_POST['unarchivetypech'])) {
    try {
        $id = $_POST['idtch'];
        $sql = "UPDATE typechambre SET statut=1 WHERE idTc=$id";

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

if (isset($_POST['edittyperes'])) {
    try {
        $n = $_POST['typeres'];
        $id = $_POST['idtypere'];
        $sql = "UPDATE typereservation SET type='$n' WHERE id=$id";

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


if (isset($_POST['deletetyperes'])) {
    try {
        $id = $_POST['idtyperes'];
        $sql = "UPDATE typereservation SET statut=0 WHERE id=$id";

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



/* * **** Clients ************ */
if (isset($_POST['editcli'])) {
    try {
        $n = $_POST['nomcli'];
        $p = $_POST['prenomcli'];
        $s = $_POST['sexe'];
        $pi = $_POST['pieceidcli'];
        $tel = $_POST['telcli'];
        $e = $_POST['emailcli'];
        $sf = $_POST['situationf'];
        $id = $_POST['idcl'];
        $sql = "UPDATE clients SET nom='$n', prenom='$p', sexe='$s', numTel=$tel, email='$e', situationFamiliale='$sf', pieceIdentite='$pi' WHERE idClient=$id";

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


if (isset($_POST['deletecli'])) {
    try {
        $id = $_POST['idClient'];

        echo 'ttttttttttttt';
        $sql = "UPDATE clients SET statut=0 WHERE idClient=$id";

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
if (isset($_POST['archiveclient'])) {
    try {
        $id = $_POST['idcli'];

        echo 'ttttttttttttt';
        $sql = "UPDATE clients SET statut=0 WHERE idClient=$id";

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

if (isset($_POST['unarchiveclient'])) {
    try {
        $id = $_POST['idcli'];

        echo 'ttttttttttttt';
        $sql = "UPDATE clients SET statut=1 WHERE idClient=$id";

// Prepare statement
        $stmt = $conn->prepare($sql);

// execute the query
        $stmt->execute();

// echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:archive_clients.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


/* * ********** Chambres *********** */
if (isset($_POST['editcha'])) {
    try {
        $n = $_POST['nomcodecha'];
        $p = $_POST['descriptifcha'];
        $id = $_POST['idch'];
        $sql = "UPDATE chambre SET nomCode='$n', descriptif='$p' WHERE idChambre=$id";

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

if (isset($_POST['archivecha'])) {
    try {
        $id = $_POST['idcha'];
        $sql = "UPDATE chambre SET statut=0 WHERE  idChambre=$id";

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
?>