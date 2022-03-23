<?php 
include_once '../config.php';
include_once './composants/head.php';
include 'navbar.php';
include '../ressources/scripts/donnees/ItemDAO.php';
$var = $_GET['item'];
$item = ItemDAO::recupererItem($var);
?>
<body>
    <section id="product-detail-section">
        <div id="product-detail-left">
            <div id="left-container">
                <img id="product-detail-img" src="../ressources/images/<?=formater($item->picture);?>" alt="">
            </div>
        </div>
        <div id="product-detail-right">
            <div id="right-container">
                <h1><?=formater($item->name);?></h1>
                <p><?=formater($item->price);?> $</p>
                <h2><?php echo $lang['Information']?></h2>
                <p id="description"><?=formater($item->description);?></p>
                <a href="#" class="productItem" data-name="<?=formater($item->name);?>" data-price="<?=formater($item->price);?>" data-qty="1" data-id="<?=formater($item->id);?>" ><?php echo $lang['Ajouter']?></a>
            </div>
        </div>
    </section>
</body>

</html>
<?php include_once 'footer.php';?>