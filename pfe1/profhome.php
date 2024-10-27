<?php
	include("setting.php");
	session_start();
	if(!isset($_SESSION['aid'])){
		header("location:index.php");
	}
	$aid=$_SESSION['aid'];
	$a=mysqli_query($set,"SELECT * FROM prof WHERE aid='$aid'");
	$b=mysqli_fetch_array($a);
	$nom=$b['nom'];
?>

<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMARTlibrary</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="banner">
		<span class="head">SMARTlibrary</span>
		<br>
		<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">GESTION DE LA BIBLIOTHEQUE INTERNE DE LA FACULTE DES SCIENCES OUJDA</marquee>
	</div>
	<br>
	<div align="center">
		<div id="wrapper">
			<br>
			<br>
			<span class="SubHead">Bienvenue <?php echo $nom;?></span>
			<br>
			<br>
			<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px>
				<tr>
					<th colspan=6 >
						<h3 class='SubHead'><u>Gestion des livres:</u></h3>
					</th>
				</tr>
				<tr>
					<td><a href="addbooksprof.php" class="Command">Ajouter des livres</a></td>
					<td><a href="requestprof.php" class="Command">Demander des nouveaux livres</a></td>
					<td><a href="./kb/emprprof.php" class="Command">Emprunter un livre</a></td>
				</tr>
			</table>
				<br>
				<br>
			<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px >
				<tr>
					<th colspan=6><h3 class='SubHead'><u>Profil:</u></h3></th>
				</tr>
				<tr>
					<td><a href="logout.php" class="Command">Se déconecter</a></td>
					<td><a href="changepasswordprof.php" class="Command">Modifier mot de passe</a></td>
				</tr>
			</table>
			<br>
			<br>

		</div>
	</div>
</body>
</html>