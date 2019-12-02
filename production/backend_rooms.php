<?php
require_once 'dbh.inc.php';
echo '111111';
$stmt = $conn->prepare("SELECT * FROM chambre WHERE capacity = :capacity OR :capacity = '0' ORDER BY nomCode");
$stmt->bindParam(':capacity', $_POST['capacity']); 
$stmt->execute();
$chambre = $stmt->fetchAll();

class Room {}

$result = array();

foreach($chambre as $room) {
  $r = new Room();
  $r->id = $room['id'];
  $r->name = $room['nomCode'];
  $r->capacity = $room['capacity'];
  // $r->status = $room['status'];
  $result[] = $r;
  
}

header('Content-Type: application/json');
echo json_encode($result);

?>
