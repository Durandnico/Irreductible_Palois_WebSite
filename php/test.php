<?php

require_once("bdd.php");

Connexion();

echo "Connexion <br/> ";// . $bdd . "<br />";
echo "Catégorie : " ;
var_dump(getCategories());
echo "<br/>";

echo "Produit : " ;
print_r(getProductByCategory("goodies"));
echo "<br/>";

echo "Produit by id (2) [start at 1]: ". getProductById(2)['name'] . "<br/>";

echo "Produit by localID (alcool) : " . getProductByCategoryWithLocalId("alcool", 1)['name'] . "<br/>";


?>