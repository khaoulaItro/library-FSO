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
$id=$_POST['id'];
$idl=$_GET['idl'];
$bn=$_POST['name'];
$au=$_POST['auth'];
$kte=$_POST['qte'];
$genre=$_POST['genre'];
$kte=$_POST['qte'];
$desc=$_POST['desc'];
$photo=$_FILES["photo"]["name"];
$tmp_fn=$_FILES["photo"]["tmp_name"];
move_uploaded_file($tmp_fn,"./pic/$photo");
if($bn!=NULL && $au!=NULL)
{
	$r="UPDATE `books` SET `id`=$idl,`name`='$bn',`author`='$au',`genre`='genre',`qte`=$kte,`image`='$photo',Description='$desc'  WHERE id=$idl";
	
	$sql=mysqli_query($set,$r);
	$y=mysqli_fetch_assoc($sql);
	if($sql)
	{
		$msg="modifié avec succès";
	}
	else
	{
		$msg="Impossible de modifier";
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
<div id="koki">
<br />
<br />

<span class="SubHead">MODIFIER DES LIVRES</span>
<br />
<br />
<form method="post" action="" enctype="multipart/form-data">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr>
  </td></tr> 
<tr><td class="labels">Nom de livre : </td><td><input type="text" name="name" placeholder="Entrer le nom de livre" size="25" class="fields" required="required" value='<?php echo($y['name'])?>'  /></td></tr>
<tr><td class="labels">Auteur : </td><td><input type="text" name="auth" placeholder="Auteur" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels"> Quantité: </td><td><input type="text" name="qte" placeholder="Quantité" size="25" class="fields" required="required"  /></td></tr>
<tr>
<td class="labels"> Genre</td>
<td>
<select name='genre'>
		
		<option value='examen' >examen</option>
		<option value='INFORMATIQUE' >INFORMATIQUE</option>
		<option value='chimie'  >CHIMIE</option>
		<option value='biologie'  >biologie</option>
		<option value='physique'  >physique</option>
		<option value='mathematique'  >mathématique </option>
		<option value='géologie '  >géologie </option>
		</select>    </td>
	</tr>



<tr><td class="labels"> Image: </td><td><input type="file" name="photo" placeholder="enter une photo:" size="25" class="fields" required="required"  /></td></tr>
 <tr class="SubHead" style="text-decoration:underline;"> <th class="labels" rowspan=2
 
 span=2 rowspan=5>description </th> 
 <td colspan=4> <textarea name='desc'  rows=10 cols=90> description ou bien résume...</textarea> </td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Modifier" class="fields" /></td></tr>


</table>
</form>
<br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>