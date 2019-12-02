<?php
include('dbh.inc.php');
if (isset($_POST['archiveref'])){
try {
	 $id=$_POST['idrefer'];
    $sql = "UPDATE reference SET statut=0 WHERE id=$id";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
	header('location:configuration.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

}
?>