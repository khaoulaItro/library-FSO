<?php
	include("setting.php");
	session_start();
	if(!isset($_SESSION['aid'])){
		header("location:index.php");
	}
	$aid=$_SESSION['aid'];
	$a=mysqli_query($set,"SELECT * FROM prof WHERE aid='$aid'");
	$b=mysqli_fetch_array($a);
	$name=$b['name'];
	$id=$_POST['id'];
	$bn=$_POST['name'];
	$au=$_POST['auth'];
	$kte=$_POST['qte'];
	$genre=$_POST['genre'];
	$kte=$_POST['qte'];
	$desc=$_POST['desc'];
	$photo=$_FILES["photo"]["name"];
	$tmp_fn=$_FILES["photo"]["tmp_name"];
	move_uploaded_file($tmp_fn,"./pic/$photo");
	if(isset($_POST['ajouter'])){
        $a="INSERT INTO books(iSBN,name, author, genre, qte, image,id,Description) VALUES ('$id','$bn','$au','$genre',$kte,'$photo','$id','$desc')";
        
        $sql=mysqli_query($set,$a);
        
        if($sql)
        {
            $msg="Ajouté avec succès";
        }
        else
        {
            $msg="Le livre existe déjà";
        }
        if(empty($bn) && empty($au)){ 
            echo "  une colonne est vide";
        }
}
echo ($sql);
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
                <a class="navbar-brand" href="./kb/emprprof.php" style="padding: 0px;float:top">
                    <img class="img-responsive" alt="Brand" src="./img/applogo.jpeg"  style="width: 55px;margin: 0px;">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        echo'<li> <li> <a href="./addbooksprof.php" class="btn btn-lg"> ajouter des livres</a></li>
                            <li> <a href="./requestprof.php" class="btn btn-lg"> demander des livres </a> </li>	
                            <li> <a href="./kb/recommendprof.php" class="btn btn-lg"> recommendation </a> </li>
                            <li> <a href="./changePasswordprof.php" class="btn btn-lg"> Modifier mot de passe </a> </li>
                            <li> <a href="./logout.php" class="btn btn-lg"> Se déconnecter </a> </li>';
                    ?>
                </ul>
            </div>
        </div>
    </nav>


	<div align="center">
		<div id="koki">
			<br>
			<br>

			<span class="SubHead">AJOUTER DES LIVRES</span>
			<br>
			<br>
			<form method="post" action="" enctype="multipart/form-data">
				<table border="0" class="table" cellpadding="10" cellspacing="10">
					<tr>
						<td class="msg" align="center" colspan="2"><?php echo $msg;?></td>
					</tr>
					<tr>
						<td class="labels">ISBN de livre : </td>
						<td>
							<input type="number" name="id" placeholder="Entrer ISBN de livre" size="25" class="fields" required="required">
						</td>
					</tr> 

					<tr>
						<td class="labels">Nom de livre : </td>
						<td>
							<input type="text" name="name" placeholder="Entrer le nom de livre" size="25" class="fields" required="required">
						</td>
					</tr>
					<tr>
						<td class="labels">Auteur : </td>
						<td>
							<input type="text" name="auth" placeholder="Auteur" size="25" class="fields" required="required">
						</td>
					</tr>
					<tr>
						<td class="labels"> Quantité: </td>
						<td>
							<input type="text" name="qte" placeholder="Quantité" size="25" class="fields" required="required">
						</td>
					</tr>
					<tr>
						<td class="labels"> Genre</td>
						<td>
							<select name='genre'>
								<option value='SCIENCE' >SCIENCE</option>
								<option value='INFORMATIQUE' >INFORMATIQUE</option>
								<option value='ECONOMIE'  >ECONOMIE</option>
								<option value='Management'  >Management</option>
								<option value='Professional'  >Professional</option>
								<option value='Examen'  >Examen</option>
								<option value='Academic '  >Academic </option>
							</select>    
						</td>
					</tr>
					<tr>
						<td class="labels"> Image: </td>
						<td>
							<input type="file" name="photo" placeholder="enter une photo:" size="25" class="fields" required="required">
						</td>
					</tr>
					<tr class="SubHead" style="text-decoration:underline;"> 
						<th class="labels" rowspan=2 span=2 rowspan=5>description </th> 
						<td colspan=4> 
							<textarea name='desc'  rows=10 cols=90> description ou bien résume...</textarea> 
						</td>
					</tr>
					
					
					<tr>
					<tr><td colspan="2" align="center"><input type="submit" value="Ajouter" class="fields" name="ajouter" /></td></tr>
					</tr>
				</table>
			</form>
			<br>
			<br>
			<a href="./kb/emprprof.php" class="link">Retour</a>
			<br>
			<br>

		</div>
	</div>
</body>
</html>
