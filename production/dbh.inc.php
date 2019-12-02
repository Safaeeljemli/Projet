<?php

// $DATABASE_HOST = 'localhost';
// $DATABASE_USER = 'root';
// $DATABASE_PASS = '';
// $DATABASE_NAME = 'stage2';
// // Try and connect using the info above.
// $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// if ( mysqli_connect_errno() ) {
// 	// If there is an error with the connection, stop the script and display the error.
// 	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
// }


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
	
	?>