<?php

if (isset($_POST['sbutton'])) {
    include 'dbh.inc.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    $hpwd = password_hash('$password', PASSWORD_BCRYPT, array('cost' => 12));
    echo $mailuid;
    echo '-----------------------';
    echo $password;
    echo '-----------------------';
    if (empty($mailuid) || empty($password)) {
        header("Location: login.php?error=emptyfields");
        exit();
        echo 'empty';
    } else {
        echo '-------------sql----------';
        $stmtcc = $conn->prepare('SELECT * FROM users WHERE blocked=0');
        $stmtcc->execute();
        $users = $stmtcc->fetchAll(PDO::FETCH_BOTH);
        foreach ($users as $user) {
            if ($user['username'] == $mailuid || $user['email'] == $mailuid) {
                echo $user['email'];
                echo 'haniiii';
                echo $hpwd;
                echo $user['pwd'];
                if ($user['pwd'] == $password) {
                    $id=$user['id'];
                    session_start();
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['nom_complet'] = $user['nom_complet'];

                    try {
                        $n = $_POST['nomuser'];
                        $sql = "UPDATE `users` SET `type`=1 WHERE id=$id";
                        // use exec() because no results are returned
                        $conn->exec($sql);
                        echo "New record created successfully";
                        header('location:admin1.php');
                    } catch (PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                    }
                    header('location:admin1.php');
                } else {
                    header('location:login.php');
                    exit();
                }
            }
        }

        $sql = "SELECT * FROM users WHERE username='$mailuid' OR email='$mailuid';";
        $stmt = mysqli_stmt_init($conn);
        echo $sql;
        echo '------stmt-----------  ';
        echo $stmt;
        echo '-----------------------';
        printf($stmt);
        /* if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo mysqli_stmt_prepare($stmt, $sql);
          header("Location: login.php?error=x");
          exit();
          } else {
          mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)) {
          //$pwdCheck = password_verify($password, $row[$pwd]);
          if ($row['pwd'] != $password) {
          //if($pwdCheck==false)
          header("Location: login.php?error=wrongpwd");
          exit();
          } else if ($row['pwd'] == $password) {
          session_start();
          $_SESSION['userId'] = $row['id'];
          $_SESSION['userUid'] = $row['username'];
          header("Location: index.php?login=success");
          exit();
          }
          } else {
          header("Location: login.php?error=nouser");
          exit();
          }
          }
          }
          } else {
          header("Location: ../login.php?error=sqlterror");
          exit();
          } */
    }
}