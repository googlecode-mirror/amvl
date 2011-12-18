// Verification pour que les attributs de type NOT NULL soient renseignes
function verif_form (frm)
{
  var tabLabel = frm.getElementsByTagName ('label'); // contient le tableau des elements de tag label
  var nbLabel = tabLabel.length; // nombre d'elements de tag label

  for (var i = 0, errors = 0, message = ''; i < nbLabel; ++i)
  {
    // Recuperation de l'element i du tableau des elements de tag label
    var elemLabel =  tabLabel[i];

    // Recuperation dans l'element i du contenu de l'attribut for 
    // correspondant au id de l'element associe au label (input, select, ...)
    var atFor = elemLabel.getAttribute ('for');

    if (atFor)
    {
      // Element associe au label ayant pour id la valeur de contenu dans for
      var elemById = document.getElementById (atFor);

      // Recuperation de la valeur de la classe associee a l'id recupere
      var atClass = elemById.getAttribute ('class');

      // Si la class est mandatory et l'element input de tag label est null alors messsage
      if (atClass == 'mandatory' && !elemById.value)
      {
        // firstChild : premier enfant de l'element label retourne le noeud (pour un label cela correspond a l'objet texte)
        // nodeValue : valeur du noeud (pour un objet texte cela correspond au texte)
        message += " - " + elemLabel.firstChild.nodeValue + "\n";
        ++errors;
      }
    }
  }

  // Si error est true alors alerte
  if (errors)
  {
    var s = (errors > 1) ? 's' : '';

    message = 'Vous devez renseigner le' + s + ' champ' + s + ' suivant' + s + ' :\n' + message;

    window.alert (message);

    return false;
  }

  return true;

} // verif_form ()

function confirm_delete (message, url, param, open)
{
  if (window.confirm (message))
  {
    if (open)
    {
      
    }
    else
    {
      contenu ('content', url, param);
    }
  }

} // confirme_delete ()


