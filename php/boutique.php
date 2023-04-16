<?php
    
    if(!isset($cat)){
        header("Location: /html/boutique.php?error=category_not_found");
        exit();
    }

    $data = $_SESSION['shop_data']['shop'][$cat];

?>


<?php
    /* Banner intel creation */
    echo '<div class="banner_intel">';
    echo    '<h1>' . $_SESSION['shop_data']['Header'][$cat]['titre'] . '</h1>';
    echo    '<p> ' . $_SESSION['shop_data']['Header'][$cat]['ss-titre'] . '</p>';
    echo    '<label style="position: absolute; top:15; right:15;" class="switch">';
    echo        '<input onclick="switch_quantity(\'' . $_SESSION['shop_data']['Header'][$cat]['quantity'] . '\');" type="checkbox" />';
    echo        '<span></span>';
    echo    '</label>';
    echo    '<span style="position: absolute; bottom: 5; right: 12;">Quantité</span>';
    echo '</div>';


    /* tête de la table */
    echo '<div class="vitrine">';
    echo    '<table>';
    echo        '<tbody>';


    /* corps de la table */
    $i = 0;
    $id = "";
    if ($cat == "alcool") $id = 'id="contain" ';
    foreach ($data as $key => $value) {
        if ($i % 4 == 0) {
            echo '<tr>';
        }
        echo '<td>';
        echo '  <div class="product">';
        echo '      <div class="product-img">';
        echo '          <img src="' . $value['image'] . '" ' . $id . ' alt="' . $value['alt'] . '" />';
        echo '      </div>';
        echo '      <div class="content">';
        echo '          <h4>' . $value['name'] . '</h4>';
        echo '          <h5>' . $value['short-description'] . '€</h5>';
        echo '          <h3>' . $value['price'] . '€</h3>';
        echo '          <span class="' . $_SESSION['shop_data']['Header'][$cat]['quantity'] . '" style="visibility:hidden;">Quantité max : <span>' . $value['quantity'] . '</span></span>';
        echo '          <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>';
        echo '      </div>';
        echo '  </div>';
        echo '</td>';
        if ($i % 4 == 3) {
            echo '</tr>';
        }
        $i++;
    }

    /* pied de la table */
    echo '      </tbody>';
    echo '  </table>';
    echo '</div>';

?>
                    