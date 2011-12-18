<?php

header ('Content-Type: text/html; charset=utf-8');

require ('../Inc/appli.inc.php');

$EX = isset ($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';

// L'utilisateur est global
$user = new MUser;

switch ($EX)
{
	case 'home'         : home (); break;
	case 'connect'     	: connect (); exit;
	case 'do_connect'  : do_connect (); break;
	case 'bibliotheque'	: biblio(); exit;
	
	default            	: home ();exit;
}

require ('../View/page.view.php');

function home ()
{  
  global $page;
  
  $page['title'] = 'Index';
  $page['class'] = 'VHtml';
  $page['method'] = 'View_html';
  $page['arg'] = 'index.html';

} // home ()

function connect ()
{
  $vhtml = new VHtml;
  $vhtml->View_html ('connexion.html');

} // connect ()

function do_connect ()
{
  if ((!isset($_REQUEST['LOGIN']))||(!isset($_REQUEST['PASSWORD'])))
    return home();

  global $user;
  global $page;

  if ( $user->Connect ($_REQUEST['LOGIN'], $_REQUEST['PASSWORD']) ) {
    $page['title'] = 'Succès de connection';
    $page['class'] = 'VHtml';
    $page['method'] = 'View_html';
    $page['arg'] = 'succes_connect.html';
  }
  else {
    $page['title'] = 'Echec de connection';
    $page['class'] = 'VHtml';
    $page['method'] = 'View_html';
    $page['arg'] = 'echec_connect.html';
  }

} // do_connect ()

function biblio()
{
	global $user;
	
	$vamv = new MAmv;
	if ($user->IsAdmin ()) 
	{
      $amv = $vamv->Select_All();
	}
	else
	{
		$amv = $vamv->Select_All_Visible();
	}
	
	$vliste = new VListeAmv;
	$liste = $vliste->View_liste_bibli($amv);
}//fbiblio()
?>