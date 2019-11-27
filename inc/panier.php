<?PHP
include "../config.php";

class Panier{
	private $p_id;
	private $ip_add;
	private $qty;

	function __construct($p_id,$ip_add,$qty){
		$this->p_id=$p_id;
		$this->ip_add=$ip_add;
		$this->qty=$qty;

	}

	function getp_id(){
		return $this->p_id;
	}
	function getip_add(){
		return $this->ip_add;
	}
	function getqty(){
		return $this->qty;
	}



	function setp_id($p_id){
		$this->p_id=$p_id;
	}
	function setip_add($ip_add){
		$this->ip_add=$ip_add;
	}
	function setqty($qty){
		$this->qty=$qty;
	}

}

?>
