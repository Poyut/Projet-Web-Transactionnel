<?php
include_once "/var/www/html/projet-web-transactionnel-2021-Voxys/config.php";
include_once $DONNEES . 'ItemDAO.php';
?>
<meta charset="UTF-8">
<button onclick="location.href = 'admin.php' "type="button">Page d'administration</button>
<link rel="stylesheet" href="../stylesheet/style-admin.css">
<?php
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prix = $_POST['price'];
    $description = $_POST['description'];
    $fileTxt = $_POST['picture'];

    ItemDAO::modifierItem($nom,$prix,$description,$fileTxt,$id);

    /*
    $modifierProduit = "UPDATE produit SET name = '$nom', price = '$prix', description = '$description', picture = '$fileTxt' WHERE id = '$id'";

    $req = $connexion->prepare($modifierProduit);
    $reussite = $req->execute();

    if($reussite)
    {
    echo("La modification à fonctionné");
    }
    else
    {
    echo("Un problème est survenu");
    }
    */
?>