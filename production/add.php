<?php

include('dbh.inc.php');
if (isset($_POST['addref'])) {
    try {
        $n = $_POST['nomref'];
        $c = $_POST['couleurref'];
        $sql = "INSERT INTO reference (nom, couleur) VALUES ('$n', '$c')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        header('location:configuration.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

if (isset($_POST['adduser'])) {
    try {
        $n = $_POST['nomuser'];
        $usrn = $_POST['name'];
        $mail = $_POST['emailuser'];
        $pwd = $_POST['pswuser'];
        $hpwd=password_hash('$pwd',PASSWORD_BCRYPT, array( 'cost' => 12 ));
        $type = $_POST['type'];
        $tel = $_POST['tel'];
        $admin = $_POST['admin'];
        $sql = "INSERT INTO users (username, email, type, pwd, nom_complet, tel, img, blocked, admin) VALUES ( '$usrn','$mail', '$type','$hpwd','$n', '$tel', '0', '0','$admin')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        header('location:admin1.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


if (isset($_POST['addtypech'])) {
    try {
        $n = $_POST['typech'];
        $np = $_POST['nbpx'];
        $sql = "INSERT INTO typechambre (type,  nbreMaxPax,statut) VALUES ('$n',  $np,'1')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        header('location:configuration.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

if (isset($_POST['addtyperes'])) {
    try {
        $n = $_POST['typeres'];
        $tp = $_POST['couleurType'];
        $sql = "INSERT INTO typereservation (type,couleur) VALUES ('$n','$tp')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        header('location:configuration.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
//ajout chambre
if (isset($_POST['addchambre'])) {
    try {
        $nch = $_POST['nomchambre'];
        $cch = $_POST['descriptifch'];
        $tch = $_POST['typechambre'];
        $idtt = $tch;
        echo 'idddd=  ';
        echo $idtt;
        $cap = $_POST['capacitechambre'];
        echo "tyyyype";
        echo $tch;
        $sql = "INSERT INTO `chambre` (`nomCode`, `descriptif`, `statut`, `capacity`, `idtypechambre`) VALUES ('$nch', '$cch', '1','$cap','$tch')";
        $sql1 = "UPDATE `typechambre` SET `nbrChambre`=nbrChambre+1 WHERE idTc=$tch";
        // use exec() because no results are returned
        $conn->exec($sql);
        $conn->exec($sql1);
        //echo $tch;
        echo "New record created successfully" . $sql;
        header('location:configuration.php');
    } catch (PDOException $e) {
        //echo $tch;
        echo $sql . "<br>" . $e->getMessage();
    }
}

//add client
if (isset($_POST['addclt'])) {
    try {
        $nom = $_POST['nomcli'];
        $prenom = $_POST['prenomcli'];
        $age = $_POST['ageClt'];
        $sexe = $_POST['sexe'];
        $cin = $_POST['pieceidcli'];
        $nat = $_POST['nationalite'];
        $numt = $_POST['telcli'];
        $email = $_POST['emailcli'];
        $sfamille = $_POST['situationf'];
        $sql = "INSERT INTO clients ( nom, prenom,age, sexe, pieceIdentite, nationalite, numTel ,email, situationFamiliale)  VALUES ('$nom', '$prenom','$age', '$sexe', '$cin','$nat','$numt', '$email', '$sfamille')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        header('location:clients.php');
    } catch (PDOException $e) {
        echo $nat;
        echo $sql . "<br>" . $e->getMessage();
    }
}
?>