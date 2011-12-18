<?php

class VHeader
{
   public function __construct() {}
   
   public function __destruct () {}
   
   //fonction de bas de page
   public function View_header()
   {
     
echo <<<HERE
  <h1 id="entete_logo" title="AMV-L" onclick="window.open('../Php/appli.php', '_self')">AMV</h1>
  <div id="barre_recherche">
	<input type="text" name="br" value="Recherche rapide"><a onclick="contenu ('content', '../Php/appli.php', 'EX=recherche')"/>AMV-L</a>
  </div>
HERE;

/*global $user;
 if ($user->IsConnected()) 
 {
echo <<<HERE
	  <label id="entete_login"><p>Bonjour <b>{$user->Name()}</b></p></label>
HERE;
 }
 */
   }//view_header)
   
} // Vcontact 
?>