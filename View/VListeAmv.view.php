<?php

class VListeAmv
{
   public function __construct() {}
   
   public function __destruct () {}
   
   public function View_liste_bibli($tabAmv)
   {
	
	echo<<<HERE
	<div id="biblio">
		<p>Vous voici dans la plus grande bibliotheque d'amv, c'est dans cette rubrique que sont repertorie tous les amvs les mieux réalisés à notre connaissance</p>
	</div>
HERE;
	global $user;
   
	$nb_amv = 0;
	foreach($tabAmv as $val)
	{
		$nb_amv = $nb_amv + 1;
	}
	
	$tableau['head'][0] = 'Image';
	$tableau['head'][1] = 'Details';
	if ($user->IsAdmin ()) 
	{
      $tableau['head'][2]= 'Visibilite';
	}
	
	for($i = 0; $i < $nb_amv; ++$i)
	{
		$id_amv = $tabAmv[$i]['ID_AMV'];
		$id_img = $tabAmv[$i]['IMG'];
		$id_nom = $tabAmv[$i]['NOM'];
		$id_auteur = $tabAmv[$i]['AUTEUR'];
		$id_visible = $tabAmv[$i]['VISIBLE'];
		$id_categorie = $tabAmv[$i]['ID_CAT'];
		$tableau['data'][0][$i] = "<img src=\"$id_img\" alt=\"AMV-L\" width=\"80\" height=\"80\">";
		$tableau['data'][1][$i] = $id_nom;
		if ($user->IsAdmin()) 
		{
			if($id_visible != 0)
			{
				$tableau['data'][2][$i] = $id_visible/*"<a href=\"#\" onclick=\"contenu ('content', '../Php/appli.php', 'EX=changeoui&ITEM=$id_item&ID_PHOTO=$id_photo')\"><img src=\"../Img/valide.png\"></a>"*/;
			}
			else
			{
				$tableau['data'][2][$i] = $id_visible/*"<a href=\"#\" onclick=\"contenu ('content', '../Php/appli.php', 'EX=changenon&ITEM=$id_item&ID_PHOTO=$id_photo')\"><img src=\"../Img/non.png.gif\"></a>"*/;
			}
		}
	}
	
	$vtab = new VTableau;
	$vtab->View_tableau($tableau);
	
   }//View_liste_bibli($tabAmv)

} // VListeAmv
?>