<?php
include('dbh.inc.php');
if (isset($_POST['submit'])) {

    try {
        $id = $_POST['idsession'];
        $sql = "UPDATE users SET type='0' WHERE id=$id";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        echo $stmt->rowCount() . " records UPDATED successfully";
        header('location:admin1.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    //session_unset();
    session_destroy();
    header("Location: index1.html");
    exit();
}
