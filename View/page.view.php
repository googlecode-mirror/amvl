<?php
$vheader = new VHeader;
$vnav = new VNav;
$vfooter = new VFooter;
$vlcont = new VLeftCont;
//$mpart = new MPart;
//$part = $mpart->Select_root ();
$vpage = new $page['class'];
?>

<<??>?xml version"1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <title>AMVL - <?= $page['title'] ?></title>
	<!-- -- >
	<base href="http://amv-l.fr/SiteAMV/Php/" >
	<!-- -->
  <link rel="icon" type="image/png" href="<?= ICONE_PAGE ?>" />
  <!--[if IE]> 
	<label id="incorrect">Oups... Le site n'apparait pas correctement? t&eacute;l&eacute;charger la derni&egrave;re version d'internet explorer: <a href="http://www.microsoft.com/france/windows/internet-explorer/telecharger-ie9.aspx">ici</a></label>
    	<label id="incorrect"><br>Internet explorer ne va pas assez vite pour vous? installer mozilla firefox: <a href="http://www.mozilla-europe.org/fr/">ici</a></label>
	<link rel="stylesheet" type="text/css" href="<?= CSS_IE_PAGE ?>" />
  <!--[endif] -->
  <!--[if !IE> <-->
    <link rel="stylesheet" type="text/css" href="<?= CSS_PAGE ?>" />
  <!--><![endif] -->
  <script type="text/javascript" src="<?= JS_PAGE ?>"></script>
	
</head>

<body>

	<div id="header">
	<?php $vheader->View_header();?>
	</div><!-- id="header" -->

	<div id="nav">
	<?php $vnav->View_nav();?>
	</div><!-- id="nav" -->

	<div id="clear">
	</div>	

	<div id="supercontent">
		<div id="leftcontent">
		<?php $vlcont->View_lcont(/*$part*/);?>
		</div><!--id=droitecontent--> 

		<div id="content">
		<?php $vpage->$page['method'] ($page['arg']);?>
		</div><!-- id="content" -->	
	</div>
	
	<div id="clear">
	</div>

	<div id="footer">
	<?php $vfooter-> View_footer();  ?> 
	</div><!--footer--> 

</body>
</html>