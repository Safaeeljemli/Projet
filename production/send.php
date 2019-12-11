<?php

function passgen1($nbChar) {
    $chaine = "mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
    srand((double) microtime() * 1000000);
    $pass = '';
    for ($i = 0; $i < $nbChar; $i++) {
        $pass .= $chaine[rand() % strlen($chaine)];
    }
    return $pass;
}

/*
  $to = "eljemlisafae@gmail.com";
  $subject = "My subject";
  $txt = "Hello world!";
  $headers = "From: test@gmail.com" . "\r\n" .
  "CC: eljemli.yousra@gmail.com";

  mail($to,$subject,$txt,$headers);
 */

if (isset($_POST['envoyerpwd'])) {
    $pswd = passgen1(10);
    include 'dbh.inc.php';
    echo 'tttttttttttttt';
    $mailuid = $_POST['mailuser'];
    echo 'sssssssssssssss';
    echo $mailuid;


    try {
        $stmtcc = $conn->prepare('select * from users where blocked=0');
        $stmtcc->execute();
        $users = $stmtcc->fetchAll(PDO::FETCH_BOTH);
        echo 'test';
        foreach ($users as $user) {
            echo '------------------';
            if ($user['email'] == $mailuid) {
                echo $user['email'];
                $mail= $user['email'];
                $id = $user['id'];
                $nom = $user['nom_complet'];
                echo 'ggggggggggggg';
                $to = $mail;
                $subject = "Demande de reanitialisation du mot de pass";
                $txt = "Bienvenu $nom,\nD'après votre demande de reinitialiser le mot de passe de votre compte Utilisateur, nous avons generer ce mot de passe pour vous.\nNouveau Mot de Passe: $pswd  \nPS: SVP changer ce mot de passe apres que vous avez connecter pour des raisons de securité.";
                $headers = "From:hotelgestionres@gmail.com";

                $envoi = mail($to, $subject, $txt, $headers);

                if ($envoi == true)
                    echo "<br /><h1>L'email a été envoyé avec succès.</h1>";
                else
                    echo "<br /><h1>&eacute;chec de l'envoi d'un email</h1>";

                try {
                    $sql = "UPDATE users SET pwd='$pswd' WHERE id=$id";
                    // Prepare statement
                    $stmt = $conn->prepare($sql);
                    // execute the query
                    $stmt->execute();
                    // echo a message to say the UPDATE succeeded
                    echo $stmt->rowCount() . " records UPDATED successfully";
                    header('location:login.php');
                } catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                }
            }
        }
    } catch (Exception $ex) {
        
    }
}
?>