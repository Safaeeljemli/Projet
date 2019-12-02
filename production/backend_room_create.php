<?php
require_once 'dbh.inc.php';

$stmt = $conn->prepare("INSERT INTO chambre (name, capacity, status) VALUES (:name, :capacity, 'Ready')");
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':capacity', $_POST['capacity']);
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Created with id: '.$conn->lastInsertId();
$response->id = $conn->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);

?>
