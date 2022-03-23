<?php include_once '../config.php' ?>
<?php include_once '../ressources/scripts/compte/CompteDAO.php';?>
<?php $transactions = CompteDAO::listerTransactions();
?>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../ressources/stylesheet/style.css">
  <title>Document</title>
</head>
<body>
  <form>
    <label for="inputText">Rechercher une facture:</label>
    <input type="text" size="30" id="inputText">
    <button type="button" onclick="rechercherFacture()">Rechercher</button>
    <script>
      function rechercherFacture() {

        var idFactureInput = document.getElementById('inputText').value;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {

          factureCible = JSON.parse(this.responseText);
          resultat = document.getElementById("results")
          console.log(factureCible);
          resultat.innerHTML = 
          '<ul class="factures" id="' + factureCible.id_transaction + '">' +
          '<li>Moyen de payment : Paypal_transaction</li>' +
            '<li>Prix total : "' + factureCible.id_transaction + '"' + '</li>' +
            '<li>La date de votre Transaction : "' + factureCible.prix + '"' + '</li>' +
            '<li>Votre Email : Temporairement hors service</li>' +
            '<li>Numero de commande "' + factureCible.id_transaction + '"' + '</li>' +
          '</ul>'
        }
        xhttp.open("GET", "../ressources/scripts/recherche-facture.php?idFactureInput=" + idFactureInput);
        xhttp.send();
      }
    </script>
  </form>
  <div id="results">
    <?php foreach($transactions as $transaction){?>
    <ul class="factures" id="<?=formater($transaction->id_transaction)?>">
      <li>Moyen de payment : <?=formater($transaction->nom)?></li>
      <li>Prix total : <?=formater($transaction->prix)?>$</li>
      <li>La date de votre Transaction : <?=formater($transaction->transaction_date)?></li>
      <li>Votre Email : <?=formater($transaction->utilisateur_mail)?> Temporairement hors service</li>
      <li>Numero de commande : <?=formater($transaction->id_transaction)?></li>
    </ul>
    <?php } ?>
  </div>
</body>
</html>