<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
?>
<!DOCTYPE html PUBLIC">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMARTlibrary</title>
<link href="stylesheet.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">SMARTlibrary</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">GESTION DE LA BIBLIOTHEQUE INTERNE DE LA FACULTE DES SCIENCES OUJDA</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">BIENVENUE <?php echo $name;?></span>
<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px>
<th colspan=10 class="SubHead">OPTION </th>
<tr><td><a href="kb/empr.php" class="Command">Emprunter un livre</a></td>
<td><a href="request.php" class="Command">Demander des nouveaux livres</a></td></tr>

</table>
<br />
<br />
<br />
<br />


<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px>
<th colspan=10 class="SubHead">PROFIL </th>


<tr><td><a href="changePassword.php" class="Command">Changer votre mot de passe</a></td><td><a href="logout.php" class="Command">Se déconecter</a></td></tr>

</table>
<br />
<br />

<br />
<br />

</div>
</div>
</body>
</html>