<?php include_once '../../config.php' ?>
<?php include_once '../../ressources/scripts/compte/CompteDAO.php';?>
<?php $transactions = CompteDAO::listerTransactions();?>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../ressources/stylesheet/style.css">
  <title>Document</title>
</head>
<body>
  <form>
    <label for="inputText">Rechercher</label>
    <input type="text" size="30" id="inputText">
    <button type="button" onclick="rechercherFacture()">Rechercher</button>
    <script>
      function rechercherFacture() {

        var idFactureInput = document.getElementById('inputText').value;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {

          factureCible = JSON.parse(this.responseText);
          resultat = document.getElementById("results")

          resultat.innerHTML = 
          '<ul class="factures" id="' + factureCible.id_transaction + '">' +
          '<li>Moyen de payment : Paypal_transaction</li>' +
            '<li>Prix total : "' + factureCible.id_transaction + '"' + '</li>' +
            '<li>La date de votre Transaction : "' + factureCible.prix + '"' + '</li>' +
            '<li>Votre Email : Temporairement hors service</li>' +
            '<li>Numero de commande "' + factureCible.id_transaction + '"' + '</li>' +
          '</ul>'
        }
        xhttp.open("GET", "recherche-facture.php?idFactureInput=" + idFactureInput);
        xhttp.send();
      }
    </script>
  </form>
  <div id="results">
    <ul class="factures" id="">
      <li>Moyen de payment : Paypal_transaction</li>
      <li>Prix total : 45$</li>
      <li>La date de votre Transaction : 2021-11-23</li>
      <li>Votre Email : Temporairement hors service</li>
      <li>Numero de commande : 73S80113XC158610G</li>
    </ul>
    <ul class="factures" id="">
      <li>Moyen de payment : Paypal_transaction</li>
      <li>Prix total : 36$</li>
      <li>La date de votre Transaction : 2021-11-23</li>
      <li>Votre Email : Temporairement hors service</li>
      <li>Numero de commande : 9C134516798093214</li>
    </ul>
  </div>
</body>

</html>