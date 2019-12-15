
<?php
class categorie
{
	private $reference;
	private $nom_categorie;
	function __construct( $nom_categorie )
	{
		$this->nom_categorie=$nom_categorie;

		
	}
function getref(){
	return $this->reference;
}

function getnom_categorie()
{
	return $this->nom_categorie;
}

function setref_categorie($reference)
{
	 $this->reference=$reference;
}

function setnom_categorie($nom_categorie)
{
	 $this->nom_categorie=$nom_categorie;
}

}