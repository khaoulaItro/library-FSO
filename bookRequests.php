<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$bn','$au')");
	if($sql)
	{
		$msg="Ajouté avec succès";
	}
	else
	{
		$msg="Le livre existe déjà";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMARTlibrary</title>
<link href="stylesheet.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">SMARTlibrary</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">GESTION DE  BIBLIOTHEQUE INTERNE DE LA FACULTE DES SCIENCES OUJDA</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Livres souhaités </span>
<br />
<br />

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr class="labels" style="text-decoration:underline;"><th>Nom du livre</th><th>Auteur</th><th>Demandé par<br>(ID Etudiant) </th></tr>
<?php
$x=mysqli_query($set,"SELECT * FROM request");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels" style="font-size:14px;"><td><?php echo $y['name'];?></td><td><?php echo $y['author'];?></td><td><?php echo $y['sid'];?></td></tr>
<?php
}
?>
</table><br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>