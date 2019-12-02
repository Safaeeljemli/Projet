<?php
require_once 'dbh.inc.php';

class Result {}

$stmt = $conn->prepare("SELECT * FROM reservations WHERE NOT ((end <= :start) OR (start >= :end)) AND id <> :id AND idChambre = :resource");
$stmt->bindParam(':start', $_POST['newStart']);
$stmt->bindParam(':end', $_POST['newEnd']);
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':resource', $_POST['newResource']);
$stmt->execute();
$overlaps = $stmt->rowCount() > 0;

if ($overlaps) {
    $response = new Result();
    $response->result = 'Error';
    $response->message = 'Cette réservation chevauche une réservation existante.';

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$stmt = $conn->prepare("UPDATE reservations SET start = :start, end = :end, idChambre = :resource WHERE id = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':start', $_POST['newStart']);
$stmt->bindParam(':end', $_POST['newEnd']);
$stmt->bindParam(':resource', $_POST['newResource']);
$stmt->execute();


$response = new Result();
$response->result = 'OK';
$response->message = 'Modifier avec succée';

header('Content-Type: application/json');
echo json_encode($response);

?>
