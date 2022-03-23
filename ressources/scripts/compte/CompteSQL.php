<?php

interface  CompteSQL
{
    public const SQL_CREER_COMPTE = "INSERT INTO compte(courriel, motDePasse, admin) VALUES (:courriel, :motDePasse, :admin);";
    public const SQL_TENTATIVE_CONNEXION = "SELECT * FROM compte WHERE courriel = :courriel and motDePasse = :motDePasse;";
    public const SQL_VERIFICATION_INSCRIPTION = "SELECT * FROM compte WHERE courriel = :courriel;";
    public const SQL_RECUPERER_MDP_CRYPTER = "SELECT motDePasse, admin FROM compte WHERE courriel = :courriel;";
    public const SQL_MODIFIER_MOTDEPASSE = "UPDATE compte SET motDePasse = :motDePasse WHERE courriel = :courriel";
    public const SQL_MODIFIER_COURRIEL = "UPDATE compte SET courriel = :courriel WHERE courriel = :courrielTemporaire";
    public const SQL_LISTER_TRANSACTION = "SELECT * FROM transaction WHERE utilisateur_mail = :courriel";
}
?>