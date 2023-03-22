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


/*-------------------------------------------------------------------------------------------------------------------------------*/

/*!
 * \fn function verif_mail(mail_input)
 * \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 * \version 1.0
 * \date Tue 21 March 2023 - 09:26:13
 * \brief Verify the mail input
 * \param mail_input:   The mail input
 * \return true if the mail is valid, false otherwise
 *   
 * \details
 *  This function verify if the mail input is valid or not
 *  If the mail is not valid, it display an error message
 *  If the mail is valid, it hide the error message
 * 
 * \todo
 * - Add color to the input if it is not valid (red) / valid (green)
 * 
 * \bug
 * - None
*/
function verif_mail(mail_input)
{
    var champ = mail_input.value;
    var erreur = document.getElementById("verif_email");
    
    if(champ == "")
    {
        erreur.innerHTML = "Veuillez remplir le champ";
        erreur.style.visibility = "visible";
        return false;
    }
    /* Merci Ugo UwU */
    else if(champ.match(/^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/) == null)
    {
        erreur.innerHTML = "Veuillez entrer un email valide"  
        erreur.style.visibility = "visible";
        return false;
    }
    else
    {
        erreur.style.visibility = "hidden";
        return true;
    }
}


/*-------------------------------------------------------------------------------------------------------------------------------*/

/*!
 *  \fn function verif_prenom_nom(input)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Wed 22 March 2023 - 08:05:44
 *  \brief veritfy if the input is a valid name (only letters)
 *  \param input:   input to verify 
 *  \return true if the input is valid, false otherwise
 *  
 * \details
 * This function verify if the input is a valid name (only letters)
 * If the input is not valid, it display an error message
 * If the input is valid, it hide the error message
 * 
 * \todo
 *  - Add color to the input if it is not valid (red) / valid (green)
 * 
 * \bug
 * - None
 */
function verif_prenom_nom(input)
{
    var champ = input.value;
    var erreur = document.getElementById("verif_" + input.id);
    var regex = new RegExp("^[a-zA-Z]+$");

    if(champ == "")
    {
        erreur.innerHTML = "Veuillez remplir le champ";
        erreur.style.visibility = "visible";
        return false;
    }
    else if(!regex.test(champ))
    {
        erreur.innerHTML = "Veuillez entrer un nom valide"  
        erreur.style.visibility = "visible";
        return false;
    }
    else
    {
        erreur.style.visibility = "hidden";
        return true;
    }   
}


/*-------------------------------------------------------------------------------------------------------------------------------*/

/* Disclaimer : useless */

/*!
 *  \fn function verif_gender(gender_input)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Wed 22 March 2023 - 08:27:38
 *  \brief Verify if the gender input is valid (selected)
 *  \param gender_input:    The gender input
 *  \return true if the gender is valid (selected), false otherwise
 * 
 *  \details
 *  This function verify if the gender input is valid (selected)
 *  If the gender is not valid, it display an error message
 *  If the gender is valid, it hide the error message
 * 
 *  \todo
 *  - Add color to the input if it is not valid (red) / valid (green)
 * 
 *  \bug
 *  - None
 */
function verif_gender(gender_input)
{
    var champ = gender_input.value;
    var erreur = document.getElementById("verif_gender");

    if(champ == "")
    {
        erreur.innerHTML = "Veuillez remplir le champ";
        erreur.style.visibility = "visible";
        return false;
    }
    else
    {
        erreur.style.visibility = "hidden";
        return true;
    }
    
}


/*-------------------------------------------------------------------------------------------------------------------------------*/

/*!
 *  \fn function verif_not_empty(input)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Wed 22 March 2023 - 08:39:16
 *  \brief Verify if the input is not empty
 *  \param input:   The input to verify
 *  \return true if the input is not empty, false otherwise
 */
function verif_not_empty(input)
{
    var champ = input.value;
    var erreur = document.getElementById("verif_" + input.id);

    if(champ == "")
    {
        erreur.innerHTML = "Veuillez remplir le champ";
        erreur.style.visibility = "visible";
        return false;
    }
    else
    {
        erreur.style.visibility = "hidden";
        return true;
    }   
}


/*-------------------------------------------------------------------------------------------------------------------------------*/

/*!
 *  \fn function verif_select(select_input)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Wed 22 March 2023 - 10:03:10
 *  \brief Verify if the select input is valid (selected and not the first option)
 *  \param select_input:    The select input
 *  \return true if the select input is valid, false otherwise
 */
function verif_select(select_input)
{
    var champ = select_input.value;
    var erreur = document.getElementById("verif_" + select_input.id);

    if(champ == select_input.children[0].value)
    {
        erreur.innerHTML = "Veuillez selectionner une option";
        erreur.style.visibility = "visible";
        return false;
    }
    else
    {
        erreur.style.visibility = "hidden";
        return true;
    }   
}


/*-------------------------------------------------------------------------------------------------------------------------------*/


/*!
 *  \fn function verif_date(date_input)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Wed 22 March 2023 - 10:13:38
 *  \brief Verify if the date input is valid
 *  \param date_input:  The date input
 *  \return true if the date input is valid, false otherwise
 * 
 *  \details
 *  This function verify if the date input is valid
 *  If the date input is not valid, it display an error message
 *  If the date input is valid, it hide the error message
 * 
 *  \todo
 *  - Add color to the input if it is not valid (red) / valid (green)
 */
function verif_date(date_input)
{
    let champ = date_input.value;
    let date = champ.split('-');
    let today = new Date();
    let erreur = document.getElementById("verif_" + date_input.id);
    
    if(champ == "")
    {
        erreur.innerHTML = "Veuillez remplir le champ";
        erreur.style.visibility = "visible";
        return false;
    }
    else if(champ.match(/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/) == null)
    {
        erreur.innerHTML = "Veuillez entrer une date valide"  
        erreur.style.visibility = "visible";
        return false;
    }
    else if(parseInt(date[0]) > today.getFullYear() || (parseInt(date[0]) == today.getFullYear() && parseInt(date[1]) > (today.getMonth()) + 1) || (parseInt(date[0]) == today.getFullYear() && parseInt(date[1]) == (today.getMonth() + 1) && parseInt(date[2]) > today.getDate()))
    {
        console.log("IN");
        erreur.innerHTML = "Vous ne pouvez pas être né dans le futur"
        erreur.style.visibility = "visible";
        return false;
    }
    else
    {
        erreur.style.visibility = "hidden";
        return true;
    }
}