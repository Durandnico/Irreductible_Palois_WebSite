/* **************************************************************************** */
/*                                                                              */
/*                                                       ::::::::  :::   :::    */
/*   IR_Website                                         :+:    :+: :+:   :+:    */
/*                                                    +:+         +:+ +:+       */
/*   By: Durandnico <durandnico@cy-tech.fr>          +#+          +#++:         */
/*                                                 +#+           +#+            */
/*   Created: 21/03/2023 09:26:13 by Durandnico   #+#    #+#    #+#             */
/*                                                ########     ###              */
/*                                                                              */
/* **************************************************************************** */

/*! 
 *  \file verif.js
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Tue 21 March 2023 - 09:26:13
 *
 *  \brief 
 *
 *
 */

function verif_mail()
{
    var champ = document.getElementById("mail").value;
    var erreur = document.getElementById("verif_email");
    var regex = new RegExp("^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$");

    if(champ == "")
    {
        erreur.innerHTML = "Veuillez remplir le champ";
        erreur.style.visibility = "visible";
        return false;
    }
    else if(!regex.test(champ))
    {
        erreur.innerHTML = "Veuillez entrer une adresse mail valide";
        erreur.style.visibility = "visible";
        return false;
    }
    else
    {
        erreur.innerHTML = "";
        erreur.style.visibility = "hidden";
        return true;
    }
}