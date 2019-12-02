<html>
<head> 
<style>
		body{
  margin:0;
background:url("images/hb.png") ;
 no-repeat : center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
h2{
  margin-top:50px;
  text-align:center;
  color:orangered;
  font-family:Arial;
  font-size:30px;
}
form{
  margin:auto;
  margin-top:5px;
  display:flex;
  flex-direction:column;
  padding:20px;
  width:30%;
  background-color:rgba(0,0,0,0.3);
color:white;
  font-family:Arial;
}
input{
  padding:10px;
  border:none;
  width:90%;
  border-radius:20px;
  margin-left: 25;
}
.btn{
  margin-top:10px;
  border:none;
  padding:10px;
  background-color:#000;
  opacity:0.6;
  color:white;
  width:100%;
  border-radius:20px;
}
.btn:hover{
	
  opacity:0.4;
  color:white;
}
.forget{
  padding:10px;
}
.forget a{
  text-decoration:none;
  color:white;
  margin-left:230;
  
}
.forget a:hover{
  color:black;
}
</style>
<title>Se connecter</title>
</head>
<body>
<h2><img src="pictures/logo1.png" alt="logo" style="width: 184; height: 150; margin-top:50;"></h2>

<form name="login" id="login" method="post" action="login.inc.php">
	<input type="text" placeholder="Nom d'utilisateur ou email" name="mailuid" required>
	<br>
	<input type="Password" placeholder="Mot de passe" name="pwd" required>
	<label class="forget"><a href="#">Mot de passe oublié?</a></label><br>
	<input type="submit" name="sbutton" value="Se connecter" class="btn" style="margin-left: 8;">

</form>
</body>
</html>
