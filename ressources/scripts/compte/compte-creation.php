<?php
    session_start();
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
                
                if(CompteDAO::verificationInscription($courriel))
                {
                    print_r("Ce courriel est déjà assoscié à un compte");
                    //header("Location: https://moderma.zonedns.education");
                }
                else
                {
                    CompteDAO::creerCompte($courriel,$motDePasse);
                    //header("Location: https://moderma.zonedns.education");
                }

            ?>
        </body>
</html>