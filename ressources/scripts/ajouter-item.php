<?php
    include_once "/var/www/html/projet-web-transactionnel-2021-Voxys/config.php";
	include_once $DONNEES_ITEM_DAO;
    ?>
    <html>
        <head>    
            <meta charset="UTF-8">
        </head>
        <body>
    <button onclick="location.href = 'admin-ajouter.php' "type="button">Retour</button>
    <button onclick="location.href = 'admin.php' "type="button">Page d'administration</button>
        <?php
            $nom = $_POST['nom'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $fileTxt = $_POST['picture'];

            ItemDAO::ajouterItem($nom,$price,$description,$fileTxt);
        ?>
    </body>
</html>