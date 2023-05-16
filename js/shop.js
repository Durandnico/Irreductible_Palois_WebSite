/* **************************************************************************** */
/*                                                                              */
/*                                                       ::::::::  :::   :::    */
/*   IR_Website                                         :+:    :+: :+:   :+:    */
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

const big_filter    = document.getElementsByClassName('big_filter')[0];     // The background filter
const header_filter = document.getElementsByClassName('header_filter')[0]   // The header filter
const full_product  = document.getElementsByClassName('Zoomed-product')[0]; // The zoomed product image and description div

/* ********************************  Global var  ********************************************** */

var filtered = false; // True if the background is filtered, false otherwise
var itsborken = false; // because close func is broken
var hid_quant = true; // True if the quantity is hidden, false otherwise

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

    /* set filter */
    filtered = switch_background_filter();
    show_zoomed_product(that);
}


/*-------------------------------------------------------------------------------------------------------------------------------*/


/*!
 *  \fn function close_zoomed_product()
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


/*-------------------------------------------------------------------------------------------------------------------------------*/


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
        /* unset the body filter */
        big_filter.style.backgroundColor = "rgba(0,0,0,0)";
        big_filter.style.filter = "brightness(100%)";

        /* unset the header filter */
        header_filter.style.zIndex = "0";
    } else {
        /* set the boyd filter */
        big_filter.style.backgroundColor = "rgba(0,0,0,0.5)";
        big_filter.style.filter = "brightness(50%)";

        /*set the header filter*/
        header_filter.style.zIndex = "100000";
    }

    return !filtered;
}


/*-------------------------------------------------------------------------------------------------------------------------------*/


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
    
    /* set the quantity */
    full_product.children[0].children[1].children[1].children[1].children[0].innerHTML = that.parentNode.children[3].children[0].innerHTML;
    
    /*set quantity input to 1 */
    document.getElementById("qte").value = 0;

    /* set the id of the product */
    document.getElementById("id_fullProduct").value = product.id;
    console.log(document.getElementById("id_fullProduct").value);
}


/*-------------------------------------------------------------------------------------------------------------------------------*/


/*!
 *  \fn function plusmoins(int)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Mon 06 March 2023 - 15:34:36
 *  \brief increment or decrement the quantity input 
 */
function plusmoins(int_value){
    const q_max = parseInt(document.getElementById("q_max").textContent);
    
    if(int_value == 1 && document.getElementById("qte").value < q_max)
        document.getElementById("qte").value++;  

    else if (int_value == -1){
        let value = --document.getElementById("qte").value;
        
        if (value < 0)
            value = 0;

    
        document.getElementById("qte").value = value;
    }

    else if (int_value != -1 && int_value != 1)
        console.log("Wrong value");

}


/*-------------------------------------------------------------------------------------------------------------------------------*/


/*!
 *  \fn function switch_quantity()
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Tue 21 March 2023 - 10:37:59
 *  \brief Switch the visibility of the quantity input
 *  \param classname:       The classname of the quantity input
 */
function switch_quantity(classname)
{
    if(document.getElementsByClassName(classname)[0].style.visibility == "hidden")
        all_quantity_visibility(classname, "visible");
    else
        all_quantity_visibility(classname, "hidden");
}


/*-------------------------------------------------------------------------------------------------------------------------------*/

/*!
 *  \fn function all_quantity_visibility(state)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Tue 21 March 2023 - 10:25:51
 *  \brief  Set the visibility of all quantity input
 *  \param classname:       The classname of the quantity input
 *  \param state:           The state of the visibility
 */
function all_quantity_visibility(classname, state)
{
    for(let quant of document.getElementsByClassName(classname))
        quant.style.visibility =  state;
}


/*-------------------------------------------------------------------------------------------------------------------------------*/

/*!
 *  \fn function test()
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Sun 16 April 2023 - 15:29:28
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
async function add_to_cart(that) {

    let product = that.parentNode.parentNode;
    let post = that.parentNode.children[0].children[0].textContent;
    let qte = document.getElementById("qte");
    let price = document.getElementById("price").textContent;
    let img = product.children[0].style.backgroundImage.replace("url(\"", "").replace("\")", "");
    let id = document.getElementById("id_fullProduct").value;

    if (qte.value == 0)
        return;
    
    /* send the request */
    const response = await fetch("/php/addCart.php"
    ,{
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "product=" + post + "&quantity=" + qte.value + "&price=" + price + "&img=" + img +"&id=" + id 
    })
    .then(response => response.text())
    .then(function(data) {
        
        if (data == "OK"){
            add_dom_cart(post, qte.value, price, img);

            /* update the quantity */
            let base_qte = document.getElementById("qte_" + id);
            let q_max = document.getElementById("q_max");
            base_qte.innerHTML = parseInt(base_qte.innerHTML) - parseInt(qte.value);
            q_max.innerHTML = base_qte.innerHTML;
            qte.value = 0;

            /* close the full product */
            close_zoomed_product();
        }
        else
            alert(data);
    })
    .catch(err => console.log(err));
    
    return (0);
}


/*-------------------------------------------------------------------------------------------------------------------------------*/

/*!
 *  \fn function add_dom_cart(post, qte, price, img)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Sun 16 April 2023 - 17:57:01
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function add_dom_cart(post, qte, price, img) {
    console.log("add_dom_cart");    

    /* remove "empty cart" */
    if(document.getElementsByClassName("empty_cart").length == 1)
        document.getElementsByClassName("empty_cart")[0].remove();

    /* verify if the product is already in the cart */
    for(let item of document.getElementsByClassName("cart_entry_intels_name")){
        if (item.innerHTML == post){
            /* update the quantity localy*/
            item.parentNode.children[1].innerHTML = parseInt(item.parentNode.children[1].innerHTML) + parseInt(qte);
            
            return (0);
        }
    }

    /* add the product to the cart */
    /* the hell of the DOM  is about to rain*/
    let cart_entry = document.createElement("div");
    cart_entry.className = "cart_entry";

    let cart_entry_img = document.createElement("img");
    cart_entry_img.className = "cart_entry_img";
    cart_entry_img.src = img;

    let cart_entry_intels = document.createElement("div");
    cart_entry_intels.className = "cart_entry_intels";

    let cart_entry_intels_name = document.createElement("span");
    cart_entry_intels_name.className = "cart_entry_intels_name";
    cart_entry_intels_name.innerHTML = post;
    cart_entry_intels_name.style.fontWeight = "bold";

    let cart_entry_intels_quantity = document.createElement("span");
    cart_entry_intels_quantity.className = "cart_entry_intels_quantity";
    cart_entry_intels_quantity.innerHTML = qte + "x";

    cart_entry_intels.appendChild(cart_entry_intels_name);
    cart_entry_intels.appendChild(cart_entry_intels_quantity);

    let cart_entry_price = document.createElement("span");
    cart_entry_price.className = "cart_entry_price";
    cart_entry_price.innerHTML = price //product.children[1].children[3].innerHTML;


    cart_entry.appendChild(cart_entry_img);
    cart_entry.appendChild(cart_entry_intels);
    cart_entry.appendChild(cart_entry_price);

    cart_entry.style.id = "item";
    document.getElementById("cart").appendChild(cart_entry);

    /* you survive the DOM, well played :) */

    return (0);
}