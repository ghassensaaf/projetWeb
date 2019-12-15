<?PHP
include 'inc/categorie.php';
include "../inc/fonctionC.php";
if(  isset($_POST['nom_categorie'])  and isset($_POST['ref']) ) 
{
   echo "here";

	$categorie1=new Categorie($_POST['nom_categorie']);
	$categorie1C=new fonctionC();
	$categorie1C->modifierCategorie($categorie1,$_POST['ref']);

   header('Location: categories.php');

	
}
