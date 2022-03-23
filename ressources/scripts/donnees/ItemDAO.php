<?php
    include_once "/var/www/html/projet-web-transactionnel-2021-Voxys/config.php";
	include_once $MODELE_ITEM;
    include_once "ItemSQL.php";

    class Accesseur
    {
        public static $basededonnees = null;

        public static function initialiser()
		{
            $usager = 'maxence';
			$motdepasse = 'MaxWeb2021@';
			$hote = 'localhost';
			$base = 'Moderma';
			$dsn = 'mysql:dbname='.$base.';host='.$hote.';charset=utf8mb4';
			ItemDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse);
			ItemDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
    }

    class ItemDAO extends Accesseur implements ItemSQL
    {
        public static function listerItems()
        {
			ItemDAO::initialiser();
			$demandeItems = ItemDAO::$basededonnees->prepare(ItemDAO::SQL_LISTE_ITEMS);
			$demandeItems->execute();
			$itemsTableau = $demandeItems->fetchAll(PDO::FETCH_ASSOC);
			foreach($itemsTableau as $itemTableau) $items[] = new Item($itemTableau);
			return $items;
        }

		public static function recupererItem($id){
			ItemDAO::initialiser();
			$demandeItem = ItemDAO::$basededonnees->prepare(ItemDAO::SQL_DETAIL_ITEM);
			$demandeItem->bindValue(':id',$id, PDO::PARAM_INT);
			$resultat = $demandeItem->execute();
			if($resultat)
			{
				$itemFetch = $demandeItem->fetch(\PDO::FETCH_ASSOC);
				$item = new Item($itemFetch);
			}
			return $item;

		}

		public static function recupererIDParNom($nom){
			ItemDAO::initialiser();
			$demandeID = ItemDAO::$basededonnees->prepare(ItemDAO::SQL_RECUPERER_ID_PAR_NOM);
			$demandeID->bindValue(':id',$id, PDO::PARAM_INT);
			$resultat = $demandeID->execute();
			if($resultat)
			{
				$itemFetch = $demandeID->fetch(\PDO::FETCH_ASSOC);
			}
			return $item;
		}
		
		public static function recupererItemParNom($nom){
			ItemDAO::initialiser();
			$demandeItem = ItemDAO::$basededonnees->prepare(ItemDAO::SQL_DETAIL_ITEM_PAR_NOM);
			$demandeItem->bindValue(':nom',$nom, PDO::PARAM_INT);
			$resultat = $demandeItem->execute();
			if($resultat)
			{
				$itemFetch = $demandeItem->fetch(\PDO::FETCH_ASSOC);
				$item = new Item($itemFetch);
				return $item;
			}
			else
			{
				return false;
			}
		}

		public static function ajouterItem($nom,$price,$description,$fileTxt)
		{
			ItemDAO::initialiser();
	   
			$demandeAjoutItem = ItemDAO::$basededonnees->prepare(ItemDAO::SQL_AJOUTER_ITEM);
			$demandeAjoutItem->bindValue(':nom',$nom, PDO::PARAM_STR);
			$demandeAjoutItem->bindValue(':price',$price, PDO::PARAM_STR);
			$demandeAjoutItem->bindValue(':description',$description, PDO::PARAM_STR);
			$demandeAjoutItem->bindValue(':fileTxt',$fileTxt, PDO::PARAM_STR);
		   	$ajout = $demandeAjoutItem->execute();
	   
			if($ajout)
			{
				echo("L'ajout à fonctionné");
			}
			else
			{
				echo("Un problème est survenu");
			}
		}

		public static function modifierItem($nom,$price,$description,$fileTxt,$id)
		{
			ItemDAO::initialiser();

			$demandeModifierItem = ItemDAO::$basededonnees->prepare(ItemDAO::SQL_MODIFIER_ITEM);
			$demandeModifierItem->bindValue(':nom',$nom, PDO::PARAM_STR);
			$demandeModifierItem->bindValue(':prix',$price, PDO::PARAM_STR);
			$demandeModifierItem->bindValue(':description',$description, PDO::PARAM_STR);
			$demandeModifierItem->bindValue(':fileTxt',$fileTxt, PDO::PARAM_STR);
			$demandeModifierItem->bindValue(':id',$id, PDO::PARAM_STR);
		   	$reussite = $demandeModifierItem->execute();

			if($reussite)
			{
			echo("La modification à fonctionné");
			}
			else
			{
			echo("Un problème est survenu");
			}
		}

		public static function supprimerItem($id)
		{
			ItemDAO::initialiser();
			
			$demandeSuppression = ItemDAO::$basededonnees->prepare(ItemDAO::SQL_SUPPRIMER_ITEM);
			$demandeSuppression->bindValue(':id',$id, PDO::PARAM_STR);
			$supprime = $demandeSuppression->execute();
		
			if($supprime)
			{
				echo("L'item à bien été supprimé");
			}
			else
			{
				echo("Un problème est survenu");
			}
		}

		public static function listerNomItems()
		{
			$listeNom;
			ItemDAO::initialiser();
			$demandeItems = ItemDAO::$basededonnees->prepare(ItemDAO::SQL_LISTE_NOM_ITEMS);
			$demandeItems->execute();
			$itemsTableau = $demandeItems->fetchAll(PDO::FETCH_ASSOC);
			foreach($itemsTableau as $itemTableau) $items[] = $itemTableau;
			return $items;
		}



        /*
        public static function detaillerItems($id)
        {
            ItemDAO::initialiser();
			$itemContrat = ItemDAO::$basededonnees->prepare(ItemDAO::SQL_DETAIL_ITEM);
			$itemContrat->bindParam(':id', $id, PDO::PARAM_INT);
			$itemContrat->execute();
			//$contrat = $itemContrat->fetchAll(PDO::FETCH_OBJ)[0];
			$contrat = $itemContrat->fetch(PDO::FETCH_ASSOC);
			return new Contrat($contrat);
        }
        */


    }


    function formater($texte)
{
	//La cette function retourne le texte mais il y a un problème avec le format utf8
	
	/*
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'UTF-8');
	//$texte = htmlentities($texte,ENT_COMPAT,'cp1252');
	*/
	return $texte;
}
?>
