<?php
    include_once "CompteDAO.php";
    ?>
    <html>
        <head>    
            <meta charset="UTF-8">
        </head>
        <body>
            <!--<button onclick="location.href = 'connexion.php' "type="button">Retour</button>-->
            <?php
                $courriel = $_POST['courriel'];
                $motDePasse = $_POST['motDePasse'];
                $motDePasseHache = password_hash($motDePasse, PASSWORD_DEFAULT);
                //var_dump($motDePasseHache);
                
                if(CompteDAO::connexion($courriel,$motDePasse))
                {
                    print_r("Vous êtes connecté");
                    //session_start();
                    header("Location: https://moderma.zonedns.education");
                }
                else
                {
                    print_r("Une information est mauvaise");
                    // CompteDAO::creerCompte($courriel,$motDePasse);
                    //header("Location: https://moderma.zonedns.education/pages/inscription.php");
                }

            ?>
        </body>
</html>