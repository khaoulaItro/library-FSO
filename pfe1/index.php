<?php
include("setting.php");
session_start();
if(isset($_SESSION['sid']))
{
	header("location:home.php");
}
$sid=mysqli_real_escape_string($set,$_POST['sid']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

if($sid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$p=md5($pass);
	$sql=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid' AND password='$p'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['sid']=$_POST['sid'];
		header("location:./kb/empr.php");
	}
	else
	{
		$s1="SELECT * FROM suspendu WHERE sid='$sid' AND password='$pass'";
		
		$s1=mysqli_query($set,$s1);
		
		if(mysqli_num_rows($s1)==1)
	{	$_SESSION['sid']=$_POST['sid'];
		$_SESSION['pass']=$_POST['pass'];
		header("location:./kb/block1.php");
	}
	else
	{
	$msg="Les coordonnés saisi sont icorrectes ";}
	}
}
?>        
<!DOCTYPE html >
<html>
<head>
	<div  align="center">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title >SMARTlibrary</title>
<link href="stylesheet.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
	</div>
</head>

<body id="a">
<div id="banner"  align="center">
	<img height=100px src="./images/b.jpeg" align="left" width="10%" height="10%">
	<span class="head" align="center">SMARTlibrary</span>

	<img class="amd" height=100px src="./images/logo.png" align="rigth" width="9%" height="10%"  margin-right="5%"  isplay="inline-block" >
	<!--<img height=100px src="./images/logo.png" align="left" width="10%" height="10%">!-->
</div>
<br />
<div id="curs">
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1"> GESTION DE BIBLIOTHEQUE INTERNE DE LA FACULTE DES SCIENCES OUJDA</marquee>
</div>
<br />
<br />
<br />
<br />
<div align="center" >
	<div id="wrapper">
	<br />
	<br />

	<span class="SubHead">Espace Etudiant</span>
	<!-- <img height=100px src="./images/b.jpg" align="left" width="20%" height="20%"> -->
	<br />
	<br />
	<form method="post" action="">
	<table border="0" cellpadding="4" cellspacing="4" class="table">
	<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
	<tr><td class="labels">ID Etudiant: </td><td><input type="text" name="sid" class="fields" size="25" placeholder="Entrer ID Etudiant" required="required" /></td></tr>
	<tr><td class="labels">Mot de passe : </td><td><input type="password" name="pass" class="fields" size="25" placeholder="Entrer le mot de passe" required="required" /></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="Identification" class="fields" /></td></tr>
	</table>
	</form>
	<br />
	<br />
	<a href="register.php" class="link">Inscription Etudiant</a>
	<br />
	<a href="admin.php" class="link">Espace Admin</a>
	<br />
	<a href="prof.php" class="link">Espace Enseignant</a>
	<br />
	<br />
	<br />
	<br />
	</div>
</div>

<a href="/reconnaissance-faciale-javascript-main/Presance/loginreco.html">

<img height=90px src="./images/images.png" align="left" width="10%" height="30%"> 
                      </a>

</body>
</html> 