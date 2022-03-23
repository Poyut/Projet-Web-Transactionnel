<?php
interface  TransactionSQL
{
    public const SQL_CREER_TRANSACTION = "INSERT INTO transaction(nom, prix, qte, utilisateur_mail, id_transaction, transaction_date) VALUES(:nom, :prix, :qte, :utilisateur_mail, :id_transaction, :transaction_date);";
    public const SQL_LIST_TRANSACTION = "SELECT * FROM transaction;";
    public const SQL_LIST_TRANSACTION_BY_USER = "SELECT * FROM transaction WHERE utilisateur_mail= :utilisateur_mail;";
}
?>