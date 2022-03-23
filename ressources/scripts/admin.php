<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Page admin</title>
        <link rel="stylesheet" href="../stylesheet/style-admin.css">
        <meta charset="UTF-8" content="noindex">
    </head>
    
    <?php
        include_once "donnees/ItemDAO.php";
    ?>
    <script src="adminJavascript.js" defer></script>

    <body>
        <h1 class="centrer">Administration</h1>
        <div class="centrer">
            <button onclick="location.href = 'admin-ajouter.php' "type="button">Ajouter un produit</button>
            <button onclick="location.href = '../../index.php';">Accueil</button>
            <input type="button" value="deconnexion" onclick="location.href = './compte/compte-deconnexion.php';">
            <p>Suggestions: <span id="txtSuggestions"></span></p>
            <p>Recherche par nom: <input type="text" id="txt1" onkeyup="afficherSuggestions(this.value)"></p>
            <a href="admin-modifier.php?item=" id="bouton-detail-et-modifier">Afficher l'item</a>
        </div>

        <?php
        /* titititi
            $connexion = Base_de_donnes::getConnexion();

            $listerProduits = "SELECT * FROM produit";
       
           $req = $connexion->prepare($listerProduits);
           $reussite = $req->execute();
           */
            $items = itemDAO::listerItems();
           if($items)
           {
               //$itemsTableau = $req->fetchAll(PDO::FETCH_ASSOC);
               foreach($items as $item)
               {                 
        ?>
            <div class="item">			
                <h3>Nom : <?=formater($item->name)?></h3>
                <p>Prix : <?=formater($item->price)?></p>
                <p>Description : <?=formater($item->description)?></p>
                <img src=../images/<?=formater($item->picture)?>></img>

				<a href="admin-modifier.php?item=<?=formater($item->id)?>">Modifier</a> 
				<a method="post" href="supprimer-item.php?item=<?=formater($item->id)?>">Supprimer</a></h4>
			</div>
        <?php
               }
           }
           else
           {
                echo("Il n'y a aucun produit");
           }
        ?>
    </body>
</html>