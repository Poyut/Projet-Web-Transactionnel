<?php include_once './ressources/scripts/donnees/ItemDAO.php';?>
<?php $items = ItemDAO::listerItems();?>
<?php include_once 'config.php'; ?>
<?php include_once './pages/composants/head.php';?>
<?php include_once './pages/navbar.php';?><script>shopcart = JSON.parse(localStorage["sca"].toString()); console.log(shopcart);</script>
    <main>
        <section id="home">
            <div id="home-container-upper">
                <img src="ressources/images/moderma2.png" alt="">
                <h1>Moderma</h1>
            </div>
            <div id="home-container-lower">
                <h2 class="home-container-lower-elements"><?php echo $lang['Amour']?></h2>
                <h3 class="home-container-lower-elements"><?php echo $lang['mots']?></h3>
                <button class="home-container-lower-elements"><a href="./pages/mission.php"><?php echo $lang['decouvrir']?></a></button>
            </div>
        </section>
        <section id="product">
            <div id="product-container-upper">
                <h1><?php echo $lang['Our']?></h1>
            </div>
            <div id="product-container-lower">
                <div id="products-grid">
                    <?php foreach($items as $item){?>
                    <div id="product-box-1" class="product-box">
                        <img id="product-img" src="../ressources/images/<?=formater($item->picture)?>" alt="">
                        <a href="./pages/product-detail.php?item=<?=formater($item->id)?>"><?=formater($item->name)?></a>
                    </div>
                    <?php }?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
<?php include_once './pages/footer.php';?>
