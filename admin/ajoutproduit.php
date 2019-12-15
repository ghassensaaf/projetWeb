<?PHP
include 'inc/produit.php';
include "../inc/fonctionC.php";



if(isset($_POST['nom_produit']) and isset($_POST['description']) and isset($_POST['prix']) and isset($_POST['catId']) )
{
   echo "here";

	$errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $tmp=explode('.',$_FILES['image']['name']);
      $file_ext=end($tmp);
      
      $extensions= array("png","jpg","jpeg");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed.";
      }
      
      if($file_size > 20971520){
         $errors[]='File size must be excately 20 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
        
         /*echo '<script language="javascript">';
         echo 'alert("Success!");
         document.location.href = "index.php";';
         echo '</script>';*/
      }else{
         print_r($errors);

         

      }
      $file_name="images/".$file_name;



	$prod=new Produit("",$_POST['nom_produit'],$file_name,$_POST['description'],$_POST['prix'],$_POST['catId']);
	$prod2=new fonctionC();
	$prod2->ajouterProduit($prod);

   header('Location: produits.php');


}