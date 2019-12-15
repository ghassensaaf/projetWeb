<?php

include 'inc/produit.php';

include "../inc/fonctionC.php";

if (isset($_POST['catId']) and isset($_POST['nom']) and isset($_POST['desc']) and isset($_POST['prix']) and isset($_POST['ref'])){

	$errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
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

	$prod=new produit($_POST['ref'],$_POST['nom'],$file_name,$_POST['desc'],$_POST['prix'],$_POST['catId']);
	$prodC=new fonctionC();
	$prodC->modifierproduit($prod);

	header('Location: produits.php');

}
?>