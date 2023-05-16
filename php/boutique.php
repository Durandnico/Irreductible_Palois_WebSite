<?php
    
    if(!isset($idCat)){
        header("Location: /pages/boutique.php?error=category_not_found");
        exit();
    }

    require_once 'bdd.php';
    
    //$data = $_SESSION['shop_data']['shop'][$cat];
    /* Récupération des données de la catégorie */
    try {
        $data = getProductByCategoryId($idCat);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit();
    }
?>


<?php

    /* Récupération des données du Header de la catégorie */
    try {
        $Header = getHeaderByCategoryId($idCat);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit();
    }

    /* Banner intel creation */
    echo '<div class="banner_intel">';
    echo    '<h1>' . $Header['title'] . '</h1>';
    echo    '<p> ' . $Header['subtitle'] . '</p>';
    echo    '<label style="position: absolute; top:15; right:15;" class="switch">';
    echo        '<input onclick="switch_quantity(\'' . $Header['quantity'] . '\');" type="checkbox" />';
    echo        '<span></span>';
    echo    '</label>';
    echo    '<span style="position: absolute; bottom: 5; right: 12;">Quantité</span>';
    echo '</div>';


    /* tête de la table */
    echo '<div class="vitrine">';
    echo    '<table>';
    echo        '<tbody>';


    /* corps de la table */
    if(!isset($i))
        $i = 0;

    /* only for Alcool, image need to be contained 
     * I could have add it in the database but I'm lazy
     */
    $id = "";
    if ($cat == "Alcool") $id = 'id="contain" ';
    
    foreach ($data as $key => $value) {
        if ($i % 4 == 0) {
            echo '<tr>';
        }
        echo '<td>';
        echo '  <div class="product" id='. $value['id'] .'>';
        echo '      <div class="product-img">';
        echo '          <img src="' . $value['image'] . '" ' . $id . ' alt="' . $value['alt'] . '" />';
        echo '      </div>';
        echo '      <div class="content">';
        echo '          <h4>' . $value['name'] . '</h4>';
        echo '          <h5>' . $value['short-description'] . '</h5>';
        echo '          <h3>' . $value['price'] . '€</h3>';
        echo '          <span class="' . $Header['quantity'] . '" style="visibility:hidden;">Quantité max : <span id=qte_'.$i.'>' . $value['quantity'] . '</span></span>';
        echo '          <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>';
        echo '      </div>';
        echo '  </div>';
        echo '</td>';
        if ($i % 4 == 3) {
            echo '</tr>';
        }
        $i++;
    }

    $i += 4 - ($i % 4);
    /* pied de la table */
    echo '      </tbody>';
    echo '  </table>';
    echo '</div>';

?>
                    