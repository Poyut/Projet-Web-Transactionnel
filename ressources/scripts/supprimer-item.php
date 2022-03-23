<?php
    include_once "/var/www/html/projet-web-transactionnel-2021-Voxys/config.php";
	include_once $DONNEES . 'ItemDAO.php';
	//include "action/gerer-contrat.php";
	//$connexion = Base_de_donnes::getConnexion();

    ?>
    <button onclick="location.href = 'admin.php' "type="button">Retour à la page administration</button>
    <link rel="stylesheet" href="../stylesheet/style-admin.css">
    <?php

    $id = $_GET['item'];

    ItemDAO::supprimerItem($id);

    header("location:http://51.79.68.250/ressources/scripts/admin.php")


/*
    $supprimerProduit = "DELETE FROM produit WHERE id = $id;";

    $req = $connexion->prepare($supprimerProduit);
    $supprime = $req->execute();

    if($supprime)
    {
        echo("L'item à bien été supprimé");
    }
    else
    {
        echo("Un problème est survenu");
    }
    */
?>