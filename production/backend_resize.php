<?php
require_once 'dbh.inc.php';

class Result {}

$stmt = $conn->prepare("UPDATE reservations SET start = :start, end = :end WHERE id = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':start', $_POST['newStart']);
$stmt->bindParam(':end', $_POST['newEnd']);
$stmt->execute();


$response = new Result();
$response->result = 'OK';
$response->message = 'Update successful';

header('Content-Type: application/json');
echo json_encode($response);

?>
