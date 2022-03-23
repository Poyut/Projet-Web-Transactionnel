<?php
    include_once "donnees/ItemDAO.php";

    ?>
    <head>
        <link rel="stylesheet" href="../stylesheet/style-admin.css">
        <meta charset="UTF-8">
    </head>
    <div class="centrer">
        <title>Page admin</title>
        <h1>Modifications</h1>
        <button onclick="location.href = 'admin.php' "type="button">Page d'administration</button>
    </div>
    
    <?php

    $id = $_GET['item'];
    $item = ItemDAO::recupererItem($id);

    /*
    $sqlAfficherData = "SELECT * FROM produit WHERE id = $id;";
    $req = $connexion->prepare($sqlAfficherData);
    $resultat = $req->execute();
    if($item)
    {
        $item = $req->fetchAll(\PDO::FETCH_ASSOC);
    }
    else
    echo("Une erreur est survenue dans la requete sql");
    */
    

    ?>

        <section id="contenu">
            <form class="centrer" action="modifier-item.php" method="post" enctype="multipart/form-data">
                <div class="name"></div>

                <div class="champ">
                    <label for="name">Nom</label>
                    <input type="text" id="nom" name="nom" value=<?=formater($item->name)?>>
                </div>
                
                <div class="champ">
                    <label for="price">Prix</label>
                    <input type="number" id="price" name="price" value=<?=formater($item->price)?>>
                </div>

                <div class="champ">
                    <label for="description">Déscription</label>
                    <input type="text" id="description" name="description" value=<?=formater($item->description)?>>
                </div>

                <div class="champ">
                    <label for="picture">Image</label>
                    <input type="text" id="picture" name="picture" value=<?=formater($item->picture)?>>
                </div>

                <input type="hidden" value="<?php echo $id; ?>" name="id"> </input>

                <input type="submit" value="Enregistrer">

            </form>
        </section>

    <?php


?>