<?PHP
include "../inc/fonctionC.php";
$produitC=new fonctionC();
if (isset($_POST["id"])){
	$prod=$produitC->getProduit($_POST['id']);
	foreach($prod as $row)
		$img=$row['image'];
	unlink($image);
	$produitC->supprimerproduit($_POST["id"]);
	header('Location: produits.php');
}

?>