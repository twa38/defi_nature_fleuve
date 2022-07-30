function verifFormulaire()                                    
{ 
    var name = document.forms["ajoutFleuve"]["nom"];
	var longueur = document.ajoutFleuve.longueur;
	var debit = document.ajoutFleuve.debit;
	var altitude = document.ajoutFleuve.altitude;
	var bassin = document.ajoutFleuve.bassin;
	var description = document.ajoutFleuve.description;
	
    if (name.value == "")                                  
    { 
        alert("Entrer un nom de fleuve."); 
        name.focus(); 
        return false; 
    }

	if (isNaN(longueur.value))                                  
    { 
        alert("Entrer un chiffre pour la longueur."); 
		longueur.focus();
        return false; 
    }

    if (isNaN(debit.value))                                  
	{ 
        alert("Entrer un chiffre pour le debit max du fleuve."); 
		debit.focus();
        return false; 
    }

    if (isNaN(altitude.value))                                  
    { 
        alert("Entrer un chiffre pour l'altitude de la source"); 
		altitude.focus();
        return false; 
    }
	
    if (isNaN(bassin.value))                                  
    { 
        alert("Entrer un chiffre pour la surface du bassin versant."); 
		bassin.focus();
        return false; 
    }
	
	 if (description.value.length > 250)                                  
    { 
        alert("La description ne doit pas dépasser 250 caractères."); 
		description.focus();
        return false; 
    }
	return true;
}

function confirmSuppr()
{
var agree=confirm("Supprimer ce fleuve, t'es fou ou quoi?!!");
if (agree)
 return true ;
else
 return false ;
}


