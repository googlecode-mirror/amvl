<?php

class VNav
{
   public function __construct() {}
   
   public function __destruct () {}
   
   public function View_nav()
   {
   
echo <<<HERE
		
<ol id="menu_g">
	<li><a onclick="window.open('/', '_self')">Acceuil</a></li>
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=bibliotheque')"/>Biblioth&egrave;que</a></li>
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=classement')"/>Classement AMV</a></li>
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=coeur')"/>Coup de coeur</a></li>
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=repertoire')"/>R&eacute;p&eacute;rtoire</a></li>
</ol>	
HERE;

/*
global $user;
    if (!$user->IsConnected()) 
	{

echo <<<HERE
	<ol id="menu_bis">
	<div id="bis">
		<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=connect')">CONNEXION</a></li>
		<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=inscription')">INSCRIPTION</a></li>
	</div>
	</ol>	
HERE;
    }
    else 
	{
echo <<<HERE
   <ol id="menu_bis">
	<div id="bis">
		<li><a href="../Php/appli.php?EX=disconnect">D&EacuteCONNEXION</a></li>
	</div>
	</ol> 	
HERE;
    }

	if ($user->IsAdmin())
	{
	echo <<<HERE
<ol id="menu_bis">
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=formnotouch')">Utilisateur</a></li>
    <li><a onclick="contenu ('content', '../Php/appli.php', 'EX=form_insert')">UPLOAD AMV</a></li>
</ol>
HERE;
	}
    else if ($user->IsDownloader ()) 
	{
echo <<<HERE
<ol id="menu_bis">
    <li><a onclick="contenu ('content', '../Php/appli.php', 'EX=form_insert')">Soumettre un AMV</a></li>
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=formUse')">Compte</a></li>
</ol>
HERE;
	}*/

   }//view_nav()

} // Vcontact 
?>