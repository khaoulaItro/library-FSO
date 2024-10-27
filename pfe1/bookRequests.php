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