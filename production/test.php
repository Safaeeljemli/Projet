<?php

$pwd = "q";
$hpwd = hash('sha512',$pwd);//password_hash('a', PASSWORD_BCRYPT, array('cost' => 12));
$tt= hash('sha512',$pwd);
echo $tt;

$pwd2 = "q";
$hpwd2 = hash('sha512',$pwd2);//password_hash('a', PASSWORD_BCRYPT, array('cost' => 12));

echo '-----------------';
echo $hpwd;
echo '-----------------';
echo $hpwd2;
 print 'incorrect username or password.';
 echo '<font color="<#FF0000"><p align="center">ffffff</p></font>';
?>