
<html>
<body onload="window.print()">

<h1> Nom produit: <?php echo $_GET['nom_produit'] ;?></h1>
<h5> Quantite: <?php echo $_GET['qty'] ;?></h5>
<h2> Prix unitaire: </h2>
<?php
echo $_GET['prix'];
?>
<h2> Prix total: <?php echo $_GET['tt'] ;?> TND</h2>



</body>
</html>
