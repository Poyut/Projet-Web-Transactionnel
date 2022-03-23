<?php
	include_once "/var/www/html/projet-web-transactionnel-2021-Voxys/config.php";
	include_once $MODELE_TRANSACTION;
    include_once "TransactionSQL.php";
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

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
			TransactionDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse);
			TransactionDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
    }
    class TransactionDAO extends Accesseur implements TransactionSQL
    {
		public static function Print()
		{
			print_r("Print ta mere");
		}
        public static function creerTransation($nom,$prix,$qte,$utilisateur_mail,$transaction_date,$id_transaction)
		{
			error_reporting(E_ERROR | E_WARNING | E_PARSE);
			TransactionDAO::initialiser();

			$demandeCreationTransaction = TransactionDAO::$basededonnees->prepare(TransactionDAO::SQL_CREER_TRANSACTION);
			$demandeCreationTransaction->bindValue(':nom',$nom, PDO::PARAM_STR);
			$demandeCreationTransaction->bindValue(':prix',$prix, PDO::PARAM_STR);
			$demandeCreationTransaction->bindValue(':qte',$qte, PDO::PARAM_STR);
			$demandeCreationTransaction->bindValue(':utilisateur_mail',$utilisateur_mail, PDO::PARAM_STR);
			$demandeCreationTransaction->bindValue(':id_transaction',$id_transaction, PDO::PARAM_STR);
			$demandeCreationTransaction->bindValue(':transaction_date',$transaction_date, PDO::PARAM_STR);
			$add = $demandeCreationTransaction->execute();
			if($add > 0)
			{
				ini_set( 'display_errors', 1 );
				error_reporting( E_ALL );
				$from = "Moderma@clubdes10.cash";
				$to = $utilisateur_mail;
				$subject = 'Votre recu de moderma.com';
				$message = "Votre total de panier est de {$prix}.
                            vous avez commande le {$transaction_date}
                            et votre id de transaction est {$id_transaction}";
				$headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
				$headers .= "From:" . $from;
				mail($to,$subject,$message, $headers);
			}
			else
			{
				echo("ERREUR");
			}
        }
        public static function listerTransaction()
        {
			TransactionDAO::initialiser();
			$demandeTransaction = TransactionDAO::$basededonnees->prepare(TransactionDAO::SQL_LIST_TRANSACTION);
			$demandeTransaction->execute();
			$transactionTableau = $demandeTransaction->fetchAll(PDO::FETCH_ASSOC);
			foreach($transactionTableau as $transactionTableau) $transaction[] = new Transaction($transactionTableau);
			return $transactionn;
        }

		public static function recupererTransaction($user_mail){
			TransactionDAO::initialiser();
			$demandeTransaction = TransactionDAO::$basededonnees->prepare(TransactionDAO::SQL_LIST_TRANSACTION_BY_USER);
			$demandeTransaction->bindValue(':utilisateur_mail',$user_mail, PDO::PARAM_INT);
			$resultat = $demandeTransaction->execute();
			if($resultat)
			{
				$transactionFetch = $demandeTransaction->fetch(\PDO::FETCH_ASSOC);
				$transaction = new Transaction($transactionFetch);
			}
            else
			{
				echo("ERREUR");
			}
			return $transaction;

		}
    }
    ?>