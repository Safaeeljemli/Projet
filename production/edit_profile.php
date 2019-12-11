<?php

require_once 'dbh.inc.php';
if (isset($_POST['edit_profile'])) {

    $uid = $_POST['uid'];
    $n = $_POST['nomc'];
    $e = $_POST['email'];
    $t = $_POST['tel'];
    $id = $_POST['id'];
    $query = "UPDATE users SET nom_complet='$n', email='$e', tel='$t', uid='$uid' WHERE id=$id";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        header('location:profile.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else if (isset($_POST['edit_pwd'])) {
    $pwd = $_POST['password'];
    $id = $_POST['id'];
    $hpwd = hash('sha512', $pwd);
    $query = "UPDATE users SET pwd='$hpwd' WHERE id=$id";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        header('location:profile.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    echo hadiii;
}
?>