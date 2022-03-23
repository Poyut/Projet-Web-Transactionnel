<!DOCTYPE html>
<html lang="fr">
    <?php
        //Test pour voir si la session fonctionne
        print_r("mon email : ".$_SESSION["courriel"]);
    ?>
    <div class="main">
        <p class="sign">Connexion</p>

        <section id="contenu">
                <form class="centrer" action="compte/compte-creation.php" method="post" enctype="multipart/form-data">
                    <div class="champ">
                        <input type="text" placeholder="Nom" id="nom" name="nom"/>
                    </div>
                    <div class="champ">
                        <input type="email" placeholder="Courriel" id="courriel" name="courriel"/>
                    </div>
                    <div class="champ">
                        <input type="password" placeholder="Mot de passe" id="motDePasse" name="motDePasse"/>
                    </div>
                    <input type="submit" value="Connexion / création">
                </form>
        </section>
    </div>
<html>