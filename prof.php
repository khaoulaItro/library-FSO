<?php
include("setting.php");
session_start();
if(isset($_SESSION['aid']))
{
	
}
$id=mysqli_real_escape_string($set,$_POST['id']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

if($aid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$p=md5($pass);
	$sql=mysqli_query($set,"SELECT * FROM admin WHERE aid='$id' AND password='$p'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$_POST['aid'];
		header("location:choix.php");
	}
	else
	{
		$msg="Les coordonnés saisi sont incorrect";
	}
}
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMARTlibrary</title>
<link href="stylesheet.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">SMARTlibrary</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">GESTION DE LA BIBLIOTHEQUE INTERNE DE LA FACULTE DES SCIENCES OUJDA </marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Identification Enseignant</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="4" cellspacing="4" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">ID Enseignant: </td><td><input type="text" name="id" class="fields" size="25" placeholder="Entrer id d'ensignant" required="required" /></td></tr>
<tr><td class="labels">Mot de passe : </td><td><input type="password" name="pass" class="fields" size="25" placeholder="Entrer mot de passe " required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Identification" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="index.php" class="link">Page d'Acceuil</a>
<br />
<br />

</div>
</div>
</body>
</html>