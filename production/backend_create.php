<?php
require_once 'dbh.inc.php';

$stmt = $conn->prepare("INSERT INTO reservations ( `code`, `dateRes`, `dateArrivee`, `dateDepart`, `nbreNuits`, `nbrePax`, `observation`, `idType`, `idReference`, `idchambre`, `iduser`) VALUES (:name, :start, :end, :nbreNuits, :nbrePax, :observation ,:type , :reference,:room,  0)");
$stmt->bindParam(':start', $_POST['start']);
$stmt->bindParam(':end', $_POST['end']);
$stmt->bindParam(':code', $_POST['code']);
$stmt->bindParam(':room', $_POST['room']);
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Crée par id: '.$conn->lastInsertId();
$response->id = $conn->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);

?>
