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
?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMARTlibrary</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css?v=<?php echo time();?>" rel="stylesheet">
<link href="stylesheet.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="banner">
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">  
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./kb/empr.php" style="padding: 0px;float:top">
                    <img class="img-responsive" alt="Brand" src="./img/applogo.jpeg"  style="width: 55px;margin: 0px;">
                </a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        echo'
                            <li> <a href="./changePasswordAdmin.php" class="btn btn-lg"> Modifier mot de passe </a> </li>
                            <li> <a href="./logout.php" class="btn btn-lg"> Se déconnecter </a> </li>';
                    ?>
                </ul>
            </div>
        </div>
    </nav>



<div align="center">
<div id="wrapper">
<br />
<br />

<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px  style="background-color:#AFDBF5;">
 	<tr>
		<td colspan=6 align="center">
			<h3 class='SubHead' align="center"><u >Gestion des livres:</u></h3>
		</td>
	</tr>
 	<tr><td align="center"><a href="addBooks.php" class="Command">Ajouter des livres</a></td>
	<td align="center"><a href="bookRequests.php" class="Command">Livres souhaitées</a></td></tr>
	<tr align="center"><td><a href="slcbook.php" class="Command">Modification des livres</a></td>
	<td align="center"><a href="supprimer.php" class="Command">Supprimer des livres</a></td></tr>
</table>

<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px  style="background-color:Lavender;">
 	<tr>
		<td colspan=6 align="center">
			<h3 class='SubHead' align="center" ><u>Gestion des demandes:</u></h3>
		</td>
	</tr>
	<tr>
		<td align="center"><a href="demandes.php" class="Command">Demandes d'emprunts</a></td>
		<td align="center"><a href="pret.php" class="Command">Gestion des prêts</a></td>
	</tr>


</table>
<br />
<br />

<br />
<br />

</div>
</div>
</body>
</html>