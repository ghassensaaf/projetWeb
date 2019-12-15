<?PHP
include "../inc/fonctionC.php";
$categorieC=new fonctionC();
if (isset($_POST["reference"])){
	$categorieC->supprimercategorie($_POST["reference"]);
	header('Location: categories.php');
}

?>