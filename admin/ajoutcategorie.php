<?PHP
include 'inc/categorie.php';
include "../inc/fonctionC.php";

if (isset($_POST['nom_categorie']))
{
$categorie1=new Categorie($_POST['nom_categorie']);

$categorie1C=new fonctionC();
$categorie1C->ajouterCategorie($categorie1);
header('Location: categories.php');
	
}else{
	echo "vérifier les champs";
}
?>