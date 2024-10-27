<?php
include("setting.php");
$name=$_POST['name'];
$email=$_POST['email'];
$sem=$_POST['sem'];
$branch=$_POST['branch'];
$sid=$_POST['sid'];
$pas=md5($_POST['pass']);
if($name==NULL || $email==NULL || $sem==NULL || $branch==NULL || $sid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($set,"INSERT INTO students(sid,name,branch,sem,password,email) VALUES('$sid','$name','$branch','$sem','$pas','$email')");
	if($sql)
	{
		$msg="Inscris avec succès";
	}
	else
	{
		$msg="L'utilisateur est déjà inscris";
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
<img height=100px src="./images/b.jpeg" align="rigth-left" width="10%" height="10%">
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">GESTION DE  BIBLIOTHEQUE INTERNE DE LA FACULTE DES SCIENCES OUJDA</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Inscription Etudiant</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="4" cellspacing="4" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Nom : </td><td><input type="text" name="name" class="fields" placeholder="Entrer nom complet" required="required" size="25" /></td></tr>
<tr><td class="labels">Email ID : </td><td><input type="email" name="email" class="fields" placeholder="Entrer votre Email " required="required" size="25" /></td></tr>
<tr><td class="labels">Semestre : </td>
<td>
<select name="sem" class="fields" required>
<option value="" disabled="disabled" selected="selected">- - Selectionnez Sem - -</option>
<option style="color:black" value="1">S1</option> 
<option style="color:black" value="2">S2</option>
<option style="color:black" value="3">S3</option>
<option style="color:black" value="4">S4</option>
<option style="color:black" value="5">S5</option>
<option style="color:black" value="6">S6</option>
</select>
</td></tr>

<tr><td class="labels">Departement: </td>
<td>
<select name="branch" class="fields" required>
<option value="" disabled="disabled" selected="selected">- - Selectionnez votre département - -</option>
<option style="color:black" value="SCIENCES MATHEMATIQUE ET INFORMATIQUE">SMI</option>
<option style="color:black" value="SCIENCES MATHEMATIQUES APPLIQUEE">SMA</option>
<option style="color:black" value="SCIENCES MATHEMATIQUES PYSIQUES CHIMIE">SMPC</option>

</select>
</td></tr>
<tr><td class="labels">ID Etudiant: </td><td><input type="text" name="sid" class="fields" placeholder="Entrer ID Etudiant" required="required" size="25" /></td></tr>
<tr><td class="labels">Mot de passe: </td><td><input type="password" name="pass" class="fields" placeholder="Entrer votre mot de passe" required="required" size="25" /></td></tr>

<tr><td class="labels">carte d'etudiant ou attestation d'inscription : </td><td><input type="file" name="photo" placeholder="enter une photo:" size="25" class="fields" required="required"  /></td></tr>
 

<tr><td colspan="2" align="center"><input type="submit" value="Inscription" class="fields" /></td></tr>
</table>
</form><br />
<br />
<a href="index.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>