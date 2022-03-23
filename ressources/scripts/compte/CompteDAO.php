<?php
    include_once "/var/www/html/projet-web-transactionnel-2021-Voxys/config.php";
	include_once $MODELE_TRANSACTION;
    include_once "Compte.php";
    include_once "CompteSQL.php";
	//session_start();

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
			CompteDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse, $options);
			CompteDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
    }

    class CompteDAO extends Accesseur implements CompteSQL
    {
		public static function testPrint()
		{
			print_r("Ceci est un test");
		}

		//----------------------- LISTER LES TRANSACTIONS DANS LE PROFIL ---------------------------------

		public static function listerTransactions()
        {
			CompteDAO::initialiser();
			$demandeTransactions = CompteDAO::$basededonnees->prepare(CompteDAO::SQL_LISTER_TRANSACTION);
			$demandeTransactions->bindValue(':courriel',$_SESSION['courriel'], PDO::PARAM_STR);
			$demandeTransactions->execute();
			$transactionsTableau = $demandeTransactions->fetchAll(PDO::FETCH_ASSOC);
			foreach($transactionsTableau as $transactionTableau) $transactions[] = new Transaction($transactionTableau);
			return $transactions;
        }

		//----------------------- CREATION DU COMPTE ---------------------------------

		public static function creerCompte($courriel,$motDePasse)
		{
			CompteDAO::initialiser();
			$motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);

			$demandeCreationCompte = CompteDAO::$basededonnees->prepare(CompteDAO::SQL_CREER_COMPTE);
			$demandeCreationCompte->bindValue(':courriel',$courriel, PDO::PARAM_STR);
			$demandeCreationCompte->bindValue(':motDePasse',$motDePasse, PDO::PARAM_STR);
			$demandeCreationCompte->bindValue(':admin',0, PDO::PARAM_STR);
			$ajout = $demandeCreationCompte->execute();
			
			
			if($ajout > 0)
			{
				ini_set( 'display_errors', 1 );
				error_reporting( E_ALL );
				$from = "Moderma@clubdes10.cash";
				$to = $courriel;
				$subject = 'Inscription';
				$message = 'Merci de nous avoir rejoint, veuillez dépenser sans modérations svp.';
				$headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
				$headers .= "From:" . $from;
				mail($to,$subject,$message, $headers);
				header("Location: https://moderma.zonedns.education/pages/connexion.php");
			}
			else
			{
				echo("Un problème est survenu");
			}
		}

		//----------------------- MODIFICATION DU COMPTE ---------------------------------

		public static function modifierCompte($courriel, $motDePasse){
			//session_start();
			
			$courrielTemporaire = $_SESSION['courriel'];
			// print_r($courrielTemporaire);
			// print_r($courriel);

			CompteDAO::initialiser();

			if($_SESSION['courriel'] != $courriel){
				$_SESSION['courriel'] = $courriel;
				// print_r($_SESSION['courriel']);
				$demandeModifierCourriel = CompteDAO::$basededonnees->prepare(CompteDAO::SQL_MODIFIER_COURRIEL); 
				$demandeModifierCourriel->bindValue(':courriel',$courriel, PDO::PARAM_STR);
				$demandeModifierCourriel->bindValue(':courrielTemporaire',$courrielTemporaire, PDO::PARAM_STR);
				print_r($courrielTemporaire);
				$demandeModifierCourriel->execute();
				print("yo");

			}

			$motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
			$demandeModifierMotdepasse = CompteDAO::$basededonnees->prepare(CompteDAO::SQL_MODIFIER_MOTDEPASSE); 
			$demandeModifierMotdepasse->bindValue(':motDePasse',$motDePasse,PDO::PARAM_STR);
			$demandeModifierMotdepasse->bindValue(':courriel',$_SESSION['courriel'], PDO::PARAM_STR);
			$demandeModifierMotdepasse->execute();

			header("Location: https://moderma.zonedns.education/pages/profil.php");
		}


		//----------------------- CONNEXION AU COMPTE ---------------------------------

		public static function connexion($courriel,$motDePasse)
		{
			CompteDAO::initialiser();
			$demandeConnexion = CompteDAO::$basededonnees->prepare(CompteDAO::SQL_RECUPERER_MDP_CRYPTER);
			$demandeConnexion->bindValue(':courriel',$courriel, PDO::PARAM_STR);
			$demandeConnexion->execute();
			$motDePasseCrypter = $demandeConnexion->fetchAll(PDO::FETCH_ASSOC);
			//print_r($motDePasseCrypter[0]["motDePasse"]);

			$verify = password_verify($motDePasse, $motDePasseCrypter[0]["motDePasse"]);
  
				// Print the result depending if they match
				if ($verify) {
					echo 'Password Verified!';
					//session_start();
					$_SESSION['loggedin'] = true;
					$_SESSION['courriel'] = $courriel;
					$_SESSION['admin'] = $motDePasseCrypter[0]['admin'];
					print_r("ICI" + $_SESSION['admin']);
					return true;
				} else {
					echo 'Incorrect Password!';
					return false;
				}

			/* ---------- CONNEXION AU COMPTE SANS ENCRYPTION ----------
			
			$demandeConnexion = CompteDAO::$basededonnees->prepare(CompteDAO::SQL_TENTATIVE_CONNEXION);
			$demandeConnexion->bindValue(':courriel',$courriel, PDO::PARAM_STR);
			$demandeConnexion->bindValue(':motDePasse',$motDePasse, PDO::PARAM_STR);	
			$demandeConnexion->execute();
			$Tableau = $demandeConnexion->fetchAll(PDO::FETCH_ASSOC);

			if(empty($Tableau))
			{
				return false;
			}
			else
			{
				//session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['courriel'] = $courriel;
				$_SESSION['admin'] = $Tableau[0]['admin'];
				return true;
			}
			*/

		}

		public static function verificationInscription($courriel)
		{
			CompteDAO::initialiser();
			
			$verificationInscription = CompteDAO::$basededonnees->prepare(CompteDAO::SQL_VERIFICATION_INSCRIPTION);
			$verificationInscription->bindValue(':courriel',$courriel, PDO::PARAM_STR);
			$succes = $verificationInscription->execute();
			$donnees = $verificationInscription->fetchAll(PDO::FETCH_ASSOC);
			//print_r(" test : " + $verificationInscription->rowCount());
			if($verificationInscription->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
    }





    function formater($texte)
{
	return $texte;
}
?>