<?php

class Item
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'name' => FILTER_SANITIZE_ENCODED,
			'price' => FILTER_SANITIZE_ENCODED,
			'description' => FILTER_SANITIZE_ENCODED,
			'picture' => FILTER_SANITIZE_ENCODED
		);
		
	protected $name;
	protected $price;
	protected $description;
	protected $picture;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Item::$filtres);

		$this->id = $tableau['id'];
		$this->name = $tableau['name'];
		$this->price = $tableau['price'];
		$this->description = $tableau['description'];
		$this->picture = $tableau['picture'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'name':
				$this->name = $valeur;
			break;
			case 'price':
				$this->price = $valeur;
			break;
			case 'description':
				$this->description = $valeur;
			break;
			case 'picture':
				$this->picture = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		//$variable = '$this->'.$propriete;
		//return $$variable;
		$self = get_object_vars($this); // externaliser pour optimiser
		return $self[$propriete];
	}	
}
?>