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
 *  \brief JS file for the verification of the form
 *
 *  
 *  \todo
 *      - Add color to the input if it is not valid (red) / valid (green)
 */


/* ********************************  Global const  ******************************************** */

const EMPTY_STRING = ""; // Empty string

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
 *  If the mail is not valid, it display an error message and return false
 *  If the mail is valid, it hide the error message and return true
 * 
*/
function verif_mail(mail_input)
{
    const VALID_MAIL = /^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/;   // Regex for a valid mail
    let champ = mail_input.value;                                   // The value of the input
    let error = document.getElementById("verif_email");             // The error div
    
    /* Merci Ugo UwU */
    if( (champ.match(VALID_MAIL)) )
    {
        error.style.visibility = "hidden";
        return true;
    }

    /* If invalid mail */
    if(champ == EMPTY_STRING){
        error.innerHTML = "Veuillez remplir le champ";
    }
    else{
        error.innerHTML = "Veuillez entrer un email valide"  
    }

    error.style.visibility = "visible";
    return false;
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
 * If the input is not valid, it display an error message and return false
 * If the input is valid, it hide the error message and return true
 * 
 * \todo
 *  - Add color to the input if it is not valid (red) / valid (green)
 * 
 */
function verif_prenom_nom(input)
{
    let champ = input.value;                                    // The value of the input
    let error = document.getElementById("verif_" + input.id);   // The error div
    const VALID_NAME = /^[a-zA-Z]+$/;                           // Regex for a valid name

    
    if(champ.match(VALID_NAME))
    {
        error.style.visibility = "hidden";
        return true;
    }   
    
    /* If invalid name */
    if(champ == EMPTY_STRING){
        error.innerHTML = "Veuillez remplir le champ";
    }
    else{
        error.innerHTML = "Veuillez entrer un " + input.id + " valide"  
    }

    error.style.visibility = "visible";
    return false;
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
 * 
 *  \details
 *  This function verify if the input is not empty
 *  If the input is empty, it display an error message and return false
 *  If the input is not empty, it hide the error message and return true
 */
function verif_not_empty(input)
{
    let champ = input.value;
    let error = document.getElementById("verif_" + input.id);

    /* If empty */
    if(champ == EMPTY_STRING)
    {
        error.innerHTML = "Veuillez remplir le champ";
        error.style.visibility = "visible";
        return false;
    }

    error.style.visibility = "hidden";
    return true;
       
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
 * 
 *  \details
 *  This function verify if the select input is valid (selected and not the first option)
 *  If the select input is not valid, it display an error message and return false
 *  If the select input is valid, it hide the error message and return true
 * 
 */
function verif_select(select_input)
{
    const EXEMPLE_OPTION = select_input.children[0].value;
    let champ = select_input.value;
    let error = document.getElementById("verif_" + select_input.id);

    if(champ == EXEMPLE_OPTION)
    {
        error.innerHTML = "Veuillez selectionner une option";
        error.style.visibility = "visible";
        return false;
    }
    
    error.style.visibility = "hidden";
    return true;   
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
 *  If the date input is not valid, it display an error message and return false
 *  If the date input is valid, it hide the error message and return true
 * 
 */
function verif_date(date_input)
{
    const VALID_DATE = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;              // Regex for a valid date
    let champ = date_input.value;                                   // The value of the input
    let date = champ.split('-');                                    // The date split in an array (year, month, day)
    let today = new Date();                                         // Today's date              
    let error = document.getElementById("verif_" + date_input.id);  // The error div
    
    /* If empty */
    if(champ == EMPTY_STRING)
    {
        error.innerHTML = "Veuillez remplir le champ";
        error.style.visibility = "visible";
        return false;
    }

    /* Check if the date is valid */
    if( ! champ.match(VALID_DATE) )
    {
        error.innerHTML = "Veuillez entrer une date valide"  
        error.style.visibility = "visible";
        return false;
    }

    /* Check if the date is in the future */
    if(parseInt(date[0]) > today.getFullYear() || (parseInt(date[0]) == today.getFullYear() && parseInt(date[1]) > (today.getMonth()) + 1) || (parseInt(date[0]) == today.getFullYear() && parseInt(date[1]) == (today.getMonth() + 1) && parseInt(date[2]) > today.getDate()))
    {
        error.innerHTML = "Vous ne pouvez pas être né dans le futur"
        error.style.visibility = "visible";
        return false;
    }

    /* If valid date */
    error.style.visibility = "hidden";
    return true;
    
}

/*-------------------------------------------------------------------------------------------------------------------------------*/

/*!
 *  \fn function verif_radio(radio_input)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Wed 22 March 2023 - 15:51:34
 *  \brief Verify if the radio input is valid (selected)
 *  \param radio_input:     The radio input
 *  \return true if the radio input is valid, false otherwise
 * 
 *  \details
 *  This function verify if the radio input is valid (selected)
 *  If all the radio input are not selected, it display an error message and return false
 *  If at least one radio input is selected, it hide the error message and return true
 * 
 */
function verif_radio(radio_input)
{
    let error = document.getElementById("verif_" + radio_input[0].name); // The error div

    /* hide the error message */
    error.style.visibility = "hidden";

    /* check if one of the radio input is selected */
    for(let rad of radio_input)
        if(rad.checked)
            return (true);    

    /* if no radio input is selected, display the error message */
    error.innerHTML = "Veuillez selectionner une option";
    error.style.visibility = "visible";

    return (false);
}


/*-------------------------------------------------------------------------------------------------------------------------------*/

/*!
 *  \fn function form_verif(submit_input)
 *  \author DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
 *  \version 1.0
 *  \date Wed 22 March 2023 - 15:08:39
 *  \brief Verify if the form is valid
 *  \return true if the form is valid, false otherwise
 *  
 *  \details
 *  This function verify if the form is valid
 *  Call each verif function to verify if the input are valid
 *  If the form is valid, send the form
 *  If the form is not valid, display the error message where it is needed and do not send the form
 * 
 */
function form_verif()
{
    /* Get all the input */
    const prenom = document.getElementById("prenom");
    const nom = document.getElementById("nom");
    const bday = document.getElementById("bday");
    const gender = document.getElementsByName("genre");
    const job = document.getElementById("job");
    const email = document.getElementById("email");
    const subject = document.getElementById("subject");
    const message = document.getElementById("message");

    /* 
     *  Verify if all the input are valid
     *  also call each verif function to display the error message
     */
    let verif = true;
    verif = verif_prenom_nom(prenom) && verif;
    verif = verif_prenom_nom(nom) && verif;
    verif = verif_date(bday) && verif;
    verif = verif_radio(gender) && verif;
    verif = verif_select(job) && verif;
    verif = verif_not_empty(email) && verif;
    verif = verif_not_empty(subject) && verif;
    verif = verif_not_empty(message) && verif;

    return (verif);
}