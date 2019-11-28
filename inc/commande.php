<?PHP
class Commande{
	private $idCommande;
	private $idClient;
	private $idAdd;
	private $idProduit;
	private $nomProduit;
	private $prixProduit;
	private $quantite;
	private $prixTotal;


	function __construct($idClient,$idAdd,$idProduit,$nomProduit,$prixProduit,$quantite,$prixTotal){
		$this->idClient=$idClient;
		$this->idAdd=$idAdd;
		$this->idProduit=$idProduit;
		$this->nomProduit=$nomProduit;
		$this->prixProduit=$prixProduit;
		$this->quantite=$quantite;
		$this->prixTotal=$prixTotal;



	}
	function getnomClient(){
		return $this->idClient;
	}
	function getidCommande(){
		return $this->idAdd;
	}
	function getidPanier(){
		return $this->idProduit;
	}
	function getnomProduit(){
		return $this->nomProduit;
	}
	function getprixProduit(){
		return $this->prixProduit;
	}
	function getprixTotal(){
		return $this->quantite;
	}
	function getquantite(){
		return $this->prixTotal;
	}

	function setidCommande($idCommande){
		$this->idCommande=$idCommande;
	}
	function setidPanier($idClient){
		$this->idClient;
	}
	function setnomProduit($idAdd){
		$this->idAdd=$idAdd;
	}
	function setprixProduit($idProduit){
		$this->idProduit=$idProduit;
	}
	function setprixTotal($nomProduit){
		$this->nomProduit=$nomProduit;
	}
	function setquantite($prixProduit){
		$this->prixProduit=$prixProduit;
	}
	function setnomClient($quantite){
		$this->quantite=$quantite;
	}
	

}

?>
