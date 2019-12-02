<?php
include('dbh.inc.php');
// echo password_hash('admin2',PASSWORD_BCRYPT, array(
	// 'cost' => 12
// ));

try {
	$c='$2y$12$zl/LzHs4bVy.kUiAM10l3OLM9kE8j74BMozrDBdZS7mEJOXeUDptK';
    $sql = "INSERT INTO users (uid,email,type, pwd, nom_complet, tel) VALUES ('admin2', 'admin@gmail.com','admin','$c','hb web', 06200)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}