<?php

interface  ItemSQL
{
    public const SQL_LISTE_ITEMS = "SELECT id, name, price, description, picture  FROM produit";
    public const SQL_LISTE_NOM_ITEMS = "SELECT name FROM produit";
    public const SQL_DETAIL_ITEM = "SELECT id, name, price, description, picture FROM produit WHERE id = :id";
    public const SQL_DETAIL_ITEM_PAR_NOM = "SELECT id, name, price, description, picture FROM produit WHERE name = :nom"; 
    public const SQL_AJOUTER_ITEM = "INSERT INTO produit(name, price, description, picture) VALUES(:nom, :price, :description, :fileTxt);";
    public const SQL_MODIFIER_ITEM = "UPDATE produit SET name = :nom, price = :prix, description = :description, picture = :fileTxt WHERE id = :id";
    public const SQL_SUPPRIMER_ITEM = "DELETE FROM produit WHERE id = :id;";
    public const SQL_RECUPERER_ID_PAR_NOM = "SELECT id FROM produit WHERE name = :nom";
}
?>