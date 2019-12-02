<?php
    include 'dbh.inc.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stage2";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // use exec() because no results are returned

   
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }



    

if(!empty($_POST['type'])  && !empty($_POST['nbrPersonne']) && !empty($_POST['tarif']) )
{
   $type =$_POST['type'];
   $nbrPersonne =$_POST['nbrPersonne'];
   $tarif =$_POST['tarif'];

    $sql = "INSERT INTO typechambre (type, nbreMaxPax,tarif) VALUES ('$type', '$nbrPersonne','$tarif')";
    $conn->exec($sql);
    header('Location: form_wizards.php');
    exit();

}else{
    echo "khawin";
}

if(!empty($_POST['description'])  && !empty($_POST['code']) && !empty($_POST['type']) )
{   
    $code =$_POST['code'];
    $description =$_POST['description'];
    
    $types =$_POST['type'];
//
// die;

    $sql = "INSERT INTO chambre (nomCode, description) VALUES ('$code', '$description')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();

    foreach($types as $type)
    {
        $sql2 = "INSERT INTO appartenir (idChambre, idTc) VALUES ('$last_id', '$type')";
        $conn->exec($sql2);
    }
 
}else{
    echo "khawin";
}


//     if(empty($_POST['mailuid']) || empty($_POST['pwd']))
//     {
// 		header("Location: login2.php?error=emptyfields");
// 		exit();
// 	}else{
// 		$sql="SELECT * FROM users WHERE uid=? OR email=?;";
// 		$stmt=mysqli_stmt_init($conn);
// 		if(!mysqli_stmt_prepare($stmt,$sql)){
// 			header("Location: login2.php?error=x");
// 			exit();
// 		}
// 		else {
    ?>