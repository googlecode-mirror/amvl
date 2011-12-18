<?php

class VLeftCont
{
   public function __construct() {}
   
   public function __destruct () {}
   
   public function View_lcont()
   {
echo <<<HERE
		
<ul id="sousmenu">
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=ajoutamv')"/>Proposer un amv</a></li>
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=ajoutteam')"/>Enregistrer une team</a></li>
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=livreor')"/>Livre d'or</a></li>
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=contact')"/>Nous contacter</a></li>
	<li><a onclick="contenu ('content', '../Php/appli.php', 'EX=condut')"/>Condition d'utilisation</a></li>
</ul>	
HERE;
   }//view_lcont()

} // VLeftCont
?>