/* **************************************************************************** */
/*                                                                              */
/*                                                       ::::::::  :::   :::    */
/*   Proj_Name                                          :+:    :+: :+:   :+:    */
/*                                                    +:+         +:+ +:+       */
/*   By: Durandnico <durandnico@cy-tech.fr>          +#+          +#++:         */
/*                                                 +#+           +#+            */
/*   Created: 06/03/2023 10:42:28 by Durandnico   #+#    #+#    #+#             */
/*                                                ########     ###              */
/*                                                                              */
/* **************************************************************************** */

/*! 
 *  \file shop.js
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Mon 06 March 2023 - 10:42:28
 *
 *  \brief JS file for the shop page
 * 
 */

/* ********************************  Global const  ******************************************** */

const big_filter = document.getElementsByClassName('big_filter')[0]; // The background filter
const full_product = document.getElementsByClassName('Zoomed-product')[0]; // The zoomed product image and description div

/* ********************************  Global var  ********************************************** */

var filtered = false; // True if the background is filtered, false otherwise
var itsborken = false; // because close func is broken

/* ********************************  function  ************************************************ */



/*!
 *  \fn function zoom_product(that)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Mon 06 March 2023 - 10:37:57
 *  \brief  Zoom the product image and description
 *  \param that:    The element that has been clicked
 */
function zoom_product(that)
{   
    /* if product already showed : do nothing*/
    if(filtered)
        return;
        
    /* set the close function */
    big_filter.onclick = close_zoomed_product;

    filtered = switch_background_filter();
    show_zoomed_product(that);
}


/*!
 *  \fn function close_zoomed_product(that)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Mon 06 March 2023 - 14:57:07
 *  \brief Close the zoomed product image and description
 */
function close_zoomed_product()
{
    /* because function is directly call when we click on add */
    itsborken = !itsborken;

    if(itsborken)
        return;
    
    /* remove the close function */
    big_filter.onclick = null;

    /* remove filter */
    filtered = switch_background_filter();

    /* hide the div */
    full_product.setAttribute('hidden', 'true');
}

/*!
 *  \fn function switch_background_filter()
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Mon 06 March 2023 - 10:36:08
 *  \brief Switch the background filter between 0.5 and 0
 *  \return True if the background is filtered, false otherwise
 */
function switch_background_filter()
{
    if (filtered) {
        big_filter.style.backgroundColor = "rgba(0,0,0,0)";
        big_filter.style.filter = "brightness(100%)";
    } else {
        big_filter.style.backgroundColor = "rgba(0,0,0,0.5)";
        big_filter.style.filter = "brightness(50%)";
    }

    return !filtered;
}

/*!
 *  \fn function show_zoomed_product(that)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Mon 06 March 2023 - 11:06:58
 *  \brief Show the product image and full description
 *  \param that:    The element that has been clicked
 */
function show_zoomed_product(that)
{
    /* get the div that contains the product image and description */
    let product = that.parentNode.parentNode;
    let full_product_intels = full_product.children[0].children[1].children[0].children;

    /*show the div */
    full_product.removeAttribute('hidden');

    /* set the image and description */
    full_product.children[0].children[0].style.backgroundImage = "url('" + product.children[0].children[0].src + "')";   
    full_product_intels[0].innerHTML = product.children[1].children[0].innerHTML;
    full_product_intels[1].innerHTML = product.children[1].children[1].innerHTML;
    full_product_intels[3].innerHTML = product.children[1].children[2].innerHTML;

    /*set quantity input to 1 */
    document.getElementById("qte").value = 1;
}

/*!
 *  \fn function plusmoins(int)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Mon 06 March 2023 - 15:34:36
 *  \brief increment or decrement the quantity input 
 */
function plusmoins(int_value){
    if(int_value == 1)
        document.getElementById("qte").value++;  

    else if (int_value == -1){
        let value = --document.getElementById("qte").value;
        
        if (value < 0)
            value = 0;

    
        document.getElementById("qte").value = value;
    }

    else
        console.log("Wrong value");

}