<?php
require_once 'dbh.inc.php';

$stmt = $conn->prepare("DELETE FROM reservations WHERE id = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'reservation et supprimer avec succée';

header('Content-Type: application/json');
echo json_encode($response);

?>
