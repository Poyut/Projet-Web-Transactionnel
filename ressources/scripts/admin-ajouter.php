<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ajouter un produit</title>
        <link rel="stylesheet" href="../stylesheet/style-admin.css">
        <meta charset="UTF-8">
    </head>

    <body>
        <h1 class="centrer">Administration</h1>
        <header class="centrer">Ajouter un produit</header>
        <div class="centrer">
            <button onclick="location.href = 'admin.php' "type="button">Retour</button>
            <button type="button">Déconnexion</button>
        </div>

        <section id="contenu">
            <form class="centrer" action="ajouter-item.php" method="post" enctype="multipart/form-data">
                <div class="name"></div>

                <div class="champ">
                    <label for="name">Nom</label>
                    <input type="text" id="nom" name="nom"/>
                </div>
                
                <div class="champ">
                    <label for="price">Prix</label>
                    <input type="number" id="price" name="price"/>
                </div>

                <div class="champ">
                    <label for="description">Déscription</label>
                    <input type="text" id="description" name="description"/>
                </div>

                <div class="champ">
                    <label for="picture">Image</label>
                    <input type="text" id="picture" name="picture"/>
                </div>

                <input type="submit" value="Enregistrer">

            </form>
        </section>

        <?php
            //TODO lister les items ?
        ?>
    </body>