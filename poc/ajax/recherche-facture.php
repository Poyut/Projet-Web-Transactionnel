<?php
  $idFactureInput = $_GET['idFactureInput'];  
  $usager = 'brice';
  $motdepasse = 'BriceWeb2021@';
  $hote = 'localhost';
  $base = 'Moderma';
  $dsn = 'mysql:dbname='.$base.';host='.$hote.';charset=utf8mb4';
  $basededonnees = new PDO($dsn, $usager, $motdepasse);
  $basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $requete = "SELECT * FROM transaction WHERE id_transaction=". "'". $idFactureInput . "'";
  $preparationRequete = $basededonnees->prepare($requete);
  $preparationRequete->bindValue(':id_transaction',$idFactureInput, PDO::PARAM_STR);
  $preparationRequete->execute();
  $resultat = $preparationRequete->fetch(PDO::FETCH_ASSOC);

  echo json_encode($resultat);
?>