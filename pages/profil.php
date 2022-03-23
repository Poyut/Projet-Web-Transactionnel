<?php include_once "../ressources/scripts/CompteSQL.php" ?>
<?php include_once '../config.php' ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ressources/stylesheet/style-profil.css">
    <script src="https://kit.fontawesome.com/2b4b8ea570.js" crossorigin="anonymous"></script>
    <title>Moderma|Profile</title>
</head>

<body>
    <a href="../index.php"><i id="back-button" class="fas fa-arrow-left fa-2x"></i></a>
    <section id="main">
        <!-- <p id="sign">S'inscrire</p> -->
        <div id="container">
            <form class="centrer" action="../../ressources/scripts/compte/compte-modification.php" method="post"
                enctype="multipart/form-data">
                <div class="champ">
                    <img src="../ressources/images/illustration-box.svg" alt="">
                </div>
                <div class="champ">
                    <input type="email" placeholder="" id="courriel" name="courriel" value=<?=$_SESSION['courriel'];?>>
                </div>
                <div class="champ">
                    <input type="password" placeholder="" id="motDePasse" name="motDePasse" required="required" minlength="5" value="">
                </div>
                <div id="champ-submit">
                    <input type="submit" value="<?php echo $lang['sauvegarder']?>">
                </div>
                <div id="champ-facture">
                    <a href="liste-facture.php"><input value="<?php echo $lang['factures']?>"></a>
                </div>
                <div id="champ-deconnexion">
                    <input class="deleteCart" type="button" value="<?php echo $lang['deconnexion']?>" onclick="location.href = '../ressources/scripts/compte/compte-deconnexion.php';">
                </div>
            </form>
        </div>
    </section>
</body>

</html>
<?php include_once './footer.php'?>