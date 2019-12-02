<?php
require_once 'dbh.inc.php';

$stmt = $conn->prepare("UPDATE reservations SET name = :name, start = :start, end = :end, idChambre = :room, status = :status, paid = :paid WHERE id = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':start', $_POST['start']);
$stmt->bindParam(':end', $_POST['end']);
$stmt->bindParam(':room', $_POST['room']);
$stmt->bindParam(':status', $_POST['status']);
$stmt->bindParam(':paid', $_POST['paid']);
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Update successful';

header('Content-Type: application/json');
echo json_encode($response);

?>
