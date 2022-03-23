<?php

class Transaction
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'nom' => FILTER_SANITIZE_ENCODED,
			'prix' => FILTER_SANITIZE_ENCODED,
			'qte' => FILTER_SANITIZE_ENCODED,
			'utilisateur_mail' => FILTER_SANITIZE_ENCODED,
            'id_transaction' => FILTER_SANITIZE_ENCODED,
            'transaction_date' => FILTER_SANITIZE_ENCODED,
		);
		
	protected $nom;
	protected $prix;
	protected $qte;
	protected $utilisateur_mail;
	protected $id_transaction;
	protected $transaction_date;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Transaction::$filtres);

		$this->id = $tableau['id'];
		$this->nom = $tableau['nom'];
		$this->prix = $tableau['prix'];
		$this->qte = $tableau['qty'];
		$this->user_utilisateur_mail = $tableau['user_mail'];
		$this->id_transaction = $tableau['id_transaction'];
		$this->transaction_date = $tableau['transaction_date'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'name':
				$this->nom = $valeur;
			break;
			case 'price':
				$this->prix = $valeur;
			break;
			case 'qte':
				$this->qte = $valeur;
			break;
			case 'utilisateur_mail':
				$this->utilisateur_mail = $valeur;
			break;
            case 'id_transaction':
				$this->id_transaction = $valeur;
			break;
            case 'transaction_date':
				$this->transaction_date = $valeur;
			break;
            
		}
	}

	public function __get($propriete)
	{
		$self = get_object_vars($this); 
		return $self[$propriete];
	}	
}
?>