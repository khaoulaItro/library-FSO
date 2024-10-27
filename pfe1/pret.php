<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM issue WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$date=date('d/m/Y');
$bn=$_POST['name'];
if($bn!=NULL)
{
	$p=mysqli_query($set,"SELECT * FROM books WHERE id='$bn'");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
	$sql=mysqli_query($set,"INSERT INTO issue(sid,name,author,date) VALUES('$sid','$bk','$ba','$date')");
	if($sql)
	{
		$msg="Ajouté avec succès";
	}
	else
	{
		$msg="erreur, veuillez réessayer plus tard";
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

<span class="SubHead">Gestion des prêts </span>
<br />
<br />

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr ><td class='labels'> Etudiant </td> <td class='labels'>Date d'emprunt</td><td class='labels'>Date de retour</td>
<td class='labels'>livre</td>
<td class='labels'>Rendu</td><td class='labels'>Suspendre</td><td class='labels'>Contacter</td><tr>

<?php
$x=mysqli_query($set,"SELECT * FROM accepter");


while($y=mysqli_fetch_assoc($x))
{
	?>
	<div >
<tr ><td class='SubHead'> <?php echo $y['sid'];?> </td><td class='SubHead'> <?php echo $y['date'];?> </td><td class='SubHead'> <?php echo $y['rendu'];?> </td>
 <td class='SubHead'><?php echo $y['name']." ".$y['author'];?></td></td>
</td> <td class='SubHead'><a class='link' href="rendu.php?var=<?php echo($y['date']) ?>"><b>rendu</b></a></td><td><a class='link' href="susp.php?var=<?php echo($y['utilisateur']) ?>"><b>suspendre</b></a> </td>
<td><a class='labels' href="https://mail.google.com/mail/u/0/?fs=1&tf=cm">Contactez</a></td></tr>
<?php		
}
?>
</div>
</table>

<br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />
</div>
</div>
</body>
</html>