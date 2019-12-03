<?php
    include 'dbh.inc.php';
	$mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    
if(isset($_POST['mailuid']) && isset($_POST['pwd']))
{
    if(empty(trim ($_POST['mailuid'])) || empty(trim ($_POST['pwd'])))
    {
		header("Location: login2.php?error=emptyfields");
		exit();
	}else{
        $stmt = $conn->prepare("SELECT * FROM users WHERE uid=:uid OR email=:uid ");
        $stmt->execute(['uid' => $mailuid] );
        $user = $stmt->fetch();
    //    print_r($user['pwd']);
    //    die;
       

        if ($password==$user['pwd'])
        {/*
            session_start();
			$_SESSION['userId']=$user['id'];
            $_SESSION['userUid']=$user['uid'];
            $_SESSION['nom_complet']=$user['nom_complet'];
            */
			header("Location: dashboard.php?login=success");
			exit();
        } 
        else {
            header("Location: login2.php?error=x");
			exit();
        }

		}
		// echo $password;
		// echo $user['pwd'];
}
  




?>

