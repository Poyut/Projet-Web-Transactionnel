<?php include_once '../config.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../ressources/stylesheet/style-connexion.css">

	<title>Moderma|Connexion</title>
</head>

<body>
	<section id="main">
		<p id="sign"><?php echo $lang['se']?></p>
		<div id="container">
			<form class="centrer" action="../../ressources/scripts/compte/compte-authentification.php" method="post" enctype="multipart/form-data">
				<div class="champ">
					<input type="email" placeholder="<?php echo $lang['Courriel']?>" id="courriel" name="courriel" />
				</div>
				<div class="champ">
					<input type="password" placeholder="<?php echo $lang['passe']?>" id="motDePasse" name="motDePasse" />
				</div>
				<div id="champ-submit">
					<input type="submit" value="<?php echo $lang['connecter']?>">
				</div>
				<p id="call-to-action"><a href="inscription.php"><?php echo $lang['inscr']?></a></p>
			</form>
		</div>
	</section>
</body>
</html>