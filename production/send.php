<?php

if (isset($_POST['envoyerpwd'])) {
    include 'dbh.inc.php';
    echo 'tttttttttttttt';
    $mailuid = $_POST['mailuser'];
    echo 'sssssssssssssss';
    echo $mailuid;
//mail("eljemlisafae@gmail.com", "Sujet", "Le message\nligne2");


    try {
        $stmtcc = $conn->prepare('select * from users where blocked=1');
        $stmtcc->execute();
        $users = $stmtcc->fetchAll(PDO::FETCH_BOTH);
$to = 'eljemlisafae@gmail.com';

// Subject
                $subject = 'Developpez.com - Test Mail';

// Message
                $msg = 'Developpez.com - Message du mail ...';

// Function mail()
        $mail = mail($to, $subject, $msg);
        foreach ($users as $user) {
            if ($user['email'] == $mailuid) {
                echo $user['email'];
                $id = $user['id'];
                echo 'ggggggggggggg';

// To
                $to = 'eljemlisafae@gmail.com';

// Subject
                $subject = 'Developpez.com - Test Mail';

// Message
                $msg = 'Developpez.com - Message du mail ...';

// Function mail()
                mail($to, $subject, $msg);
            }
        }
    } catch (Exception $ex) {
        
    }
}
?>