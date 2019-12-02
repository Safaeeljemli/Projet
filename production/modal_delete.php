<?php

include('archive.php');

try {
    if (typechambre['nbrChambre'] == 0) {
        try {
            $sql = "DELETE FROM `typechambre` WHERE `idTc`='" . $_GET['del_id'] . "'";
            //$query = mysqli_query($conn, $seclet)or die($seclet);
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
            header('location:archive.php');
        } catch (Exception $ex) {
            echo 'eeerrrrrrr';
        }
    } else {
        echo("errooooooooooor");
    }



    header('location:archive.php');
} catch (Exception $exc) {
    echo $sql . "<br>" . $exc->getMessage();
}
?>