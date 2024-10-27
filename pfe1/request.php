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
$bn=$_POST['name'];
$ba=$_POST['author'];
if($bn!=NULL && $ba!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO request(name,author,sid) VALUES('$bn','$ba','$sid')");
	if($sql)
	{
		$msg="Demandé avec succès";
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
                       <li> <a href="./request.php" class="btn btn-lg"> demander des livres </a> </li>	
                       <li> <a href="./kb/recommend.php" class="btn btn-lg"> recommendation </a> </li>
                       <li> <a href="./changePassword.php" class="btn btn-lg"> Modifier mot de passe </a> </li>
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

        <span class="SubHead">Demander des livres</span>
        <br />
        <br />
        <form method="post" action="">
        <table border="0" class="table" cellpadding="10" cellspacing="10">
            <tr><td class="msg" align="center" colspan="2" >
                <?php echo $msg;?></td>
            </tr> 
             <tr>
                <td class="labels">livre : </td><td>
                    <input type="text" size="25" class="fields" required="required" name="name" placeholder="Entrer le nom de livre" />
            </td>
        </tr>
        <tr><td class="labels">Auteur : </td><td><input type="text" size="25" class="fields" required="required" name="author" placeholder="Enter le nom de l'auteur" /></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" class="fields" value="Demander" /></td></tr>
        </table>
        </form>

        <br />
        <br />
        <a href="kb/empr.php" class="link">Retour</a>
        <br />
        <br />

    </div>
</div>
</body>
</html>