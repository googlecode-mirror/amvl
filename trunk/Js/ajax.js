var global = this;

global.eval (); // pour l'�valuation des fonctions javascripts

// Connexion au serveur http
function getXhr ()
{
  if (window.XMLHttpRequest) // Firefox et autres
  {
    xhr = new XMLHttpRequest ();
  }
  else if (window.ActiveXObject) // Internet Explorer
  {
    try
    {
      xhr = new ActiveXObject ("Msxml2.XMLHTTP"); // IE version > 5
    }
    catch(e)
    {
      xhr = new ActiveXObject ("Microsoft.XMLHTTP");
    }
  }
  else // XMLHttpRequest non support� par le navigateur
  {
    alert ('Votre navigateur ne supporte pas les objets XMLHttpRequest !');
    xhr = false;
  }

  return xhr;

} // getXhr ()

// Modification du contenu d'un identifiant id suivant le programme php
function contenu (id, php, param, callback)
{
  var c = document.getElementById (id);
  c.innerHTML = '<p id="loading"><img src="../Img/loading.gif" alt="Chargement"/>Chargement en cours</p>';

  var xhr = getXhr (); // R�cup�re la connexion au serveur http

  xhr.open ('POST', php, true); // Ouvre la connexion avec le serveur http avec comme url php

  xhr.setRequestHeader ('Content-Type','application/x-www-form-urlencoded');

  xhr.send (param); // Envoie l'url php pour ex�cution au serveur http avec les parametres param

  // Ex�cution en mode asynchrone de la fonction d�s que l'on obtient une r�ponse du serveur http
  xhr.onreadystatechange = function ()
  {
    // Si on a tout re�u (4) et que le serveur est ok (200)
    // Modifie l'�l�ment ayant pour identificateur id suivant le programme php 
    if(xhr.readyState == 4 && xhr.status == 200)
    {
      c.innerHTML = xhr.responseText;

      if (callback != null)
      {
        eval (callback); // Pour l'�valuation des fonctions javascripts
      }

      // Si on a du javascript on identifie les scripts et on force la valuation eval()
      var allscript = c.getElementsByTagName ('script');	  
      for (var i = 0; i < allscript.length; ++i)
      {
        window.eval (allscript[i].text);
      }
    }
  }

} // contenu()

// Recuperation de la reponse au format json
function action_form (php, param)
{
  xhr = getXhr (); // R�cup�re la connexion au serveur http

  xhr.open ('POST', php, false); // Ouvre la connexion avec le serveur http avec comme url php

  xhr.setRequestHeader ('Content-Type','application/x-www-form-urlencoded');

  xhr.send (param); // Envoie l'url php pour ex�cution au serveur http avec les parametres param

  return eval ('(' +  xhr.responseText + ')');

} // action_form ()
