<?php

class VFooter
{
   public function __construct() {}
   
   public function __destruct () {}
   
   //fonction de bas de page
   public function View_footer()
   {
echo<<<HERE
	copyright amvl <a onclick="contenu ('content', '../Php/appli.php', 'EX=connect')">team.</a>
HERE;
   }//View_contact

} // Vcontact 
?>