<?php

// Chargement automatique des class (PHP5)
function __autoload($class)
{
  switch ($class[0])
  {
    case 'V' : $file = '../View/' . $class . '.view.php'; break;
    case 'M' : $file = '../Mod/' . $class . '.mod.php'; break;
    case 'C' : $file = '../Class/' . $class . '.class.php'; break;
  }
  
  require_once ($file);

} // __autoload()

// mise en forme html des chaines de caract�res pour un tableau
function get_html (&$val)
{
  if (is_array($val))
  {
    array_walk ($val, 'get_html');
  }
  else
  {
    $val = htmlspecialchars ($val);
  }
}

// fontion de debuggage 
function debug ($Tval)
{
  echo '<pre>'; print_r ($Tval); echo '</pre>';

} // debug ()

?>