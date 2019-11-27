<?PHP
class Commande{
	private $IdCommande;
	private $IdPanier;
	private $NomProduit;
	private $PrixProduit;
	private $PrixTotal;
	private $Quantite;
	private $NomClient;

	function __construct($IdPanier,$NomProduit,$PrixProduit,$PrixTotal,$Quantite,$NomClient){
		$this->IdPanier=$IdPanier;
		$this->NomProduit=$NomProduit;
		$this->PrixProduit=$PrixProduit;
		$this->PrixTotal=$PrixTotal;
		$this->Quantite=$Quantite;
		$this->NomClient=$NomClient;

	}

	function getNomClient(){
		return $this->NomClient;
	}
	function getIdCommande(){
		return $this->IdCommande;
	}
	function getIdPanier(){
		return $this->IdPanier;
	}
	function getNomProduit(){
		return $this->NomProduit;
	}
	function getPrixProduit(){
		return $this->PrixProduit;
	}
	function getPrixTotal(){
		return $this->PrixTotal;
	}
	function getQuantite(){
		return $this->Quantite;
	}

	function setIdCommande($IdCommande){
		$this->IdCommande=$IdCommande;
	}
	function setIdPanier($IdPanier){
		$this->IdPanier;
	}
	function setNomProduit($NomProduit){
		$this->NomProduit=$NomProduit;
	}
	function setPrixProduit($PrixProduit){
		$this->PrixProduit=$PrixProduit;
	}
	function setPrixTotal($PrixTotal){
		$this->PrixTotal=$PrixTotal;
	}
	function setQuantite($Quantite){
		$this->Quantite=$Quantite;
	}
	function setNomClient($NomClient){
		$this->NomClient=$NomClient;
	}

}

?>
