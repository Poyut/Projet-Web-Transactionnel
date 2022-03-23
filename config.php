<?php
session_start();
//$_SESSION['admin'] = 0;
// ========== C H E M I N S ========== //

// Absolue
$DONNEES = '/var/www/html/projet-web-transactionnel-2021-Voxys/ressources/scripts/donnees/';
$MODELE = '/var/www/html/projet-web-transactionnel-2021-Voxys/ressources/scripts/modele/';
$PAGES = '/var/www/html/projet-web-transactionnel-2021-Voxys/pages/';

// Spécifique
$MODELE_ITEM = '/var/www/html/projet-web-transactionnel-2021-Voxys/ressources/scripts/modele/Item.php';
$DONNEES_ITEM_DAO = '/var/www/html/projet-web-transactionnel-2021-Voxys/ressources/scripts/donnees/ItemDAO.php';

//pour les transaction
$MODELE_TRANSACTION = '/var/www/html/projet-web-transactionnel-2021-Voxys/ressources/scripts/transaction/Transaction.php';
$DONNEES_TRANSACTION_DAO = '/var/www/html/projet-web-transactionnel-2021-Voxys/ressources/scripts/transaction/TransactionDAO.php';

// ================================== //

// Changer la langue de la page web
if (!isset($_SESSION['lang']))
    $_SESSION['lang'] = "fr";
else if($_SESSION['lang'] && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
    if($_GET['lang'] == "fr")
        $_SESSION['lang'] = "fr";
    else if ($_GET['lang'] == "en")
        $_SESSION['lang'] = "en";
}
require_once "languages/" .$_SESSION['lang'] . ".php";
// ================================== //
?>