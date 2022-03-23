<?php 
session_start();
include_once "CompteDAO.php";

$courriel = $_POST['courriel'];
$motDePasse = $_POST['motDePasse'];


if($courriel == null || $motDePasse == null){
    header("Location: https://moderma.zonedns.education/pages/profil.php");
}

// print_r($_SESSION['courriel']);

CompteDAO::modifierCompte($courriel, $motDePasse);
?>