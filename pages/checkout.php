<?php include_once '../config.php'?>
<?php include_once '../ressources/scripts/donnees/ItemDAO.php';?>
<?php include_once 'composants/head.php';?>
<?php include_once 'navbar.php';?>
    <main>
        <p id="montant-total"></p>
        <br><br>
        <div class ="checkout-big-box">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $lang['Panier']?></h4>
                </div>
                <div class="modal-body">
        <div class="checkout-list">
            <table class="table table-hover">
                <thead class="thead-inverse">
                    <tr>
                        <th>Qtt</th>
                        <th><?php echo $lang['Nom']?></th>
                        <th><?php echo $lang['Coût']?></th>
                        <th class="text-xs-right">Total</th>
                    </tr>
                </thead>
                <tbody id="output"> </tbody>
            </table>
        </div></div>
        <div id="smart-button-container">
            <div style="text-align: center;">
            <div id="paypal-button-container"></div>
        </div>
    </div>
    <div id="demo"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=AYpUiqJuEtfTti5cUr4fMHC8ECUHWkLQUXOu6mNAYGUWNx7-JvrUzmqzMusnAue0KTa8kWEfAgT50SDA&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
    <script src="../ressources/scripts/paypal-button-script.js"></script>
</div>
</div>
</main>
</body>
</html>
<?php include_once 'footer.php';?>