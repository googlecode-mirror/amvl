<?php

class VTableau
{
  public function __construct () {}

  public function __destruct () {}

  public function View_tableau ($_tableau)
  {
    $nb_col = count ($_tableau['head']);
	$nb_row = 0;
	if ($_tableau['data'])
	{
		$nb_row = count ($_tableau['data'][0]);
	}
	else
	{
		$nb_row = 0;
	}

    if (isset($_tableau['id_target'])) {
      $onclick = "contenu ('{$_tableau['id_target']}', '{$_tableau['url_new']}', '{$_tableau['param_new']}')";
      $button_new = '<button class="new" value="Nouveau" title="Nouveau" onclick="'.$onclick.'">Nouveau</button>';
    }
    else {
      $button_new = '';
    }
    $button_print = '<button class="print" onclick="print ()">Print</button>';

    echo '<table class="tableau">';
    echo "<caption>$button_new $button_print</caption>";
    echo '<thead><tr>';
    for ($i = 0; $i < $nb_col; ++$i)
    {
      echo '<th class="pointer" onclick="tri_bulle (' . $i . ')">' . $_tableau['head'][$i] . '</th>';
    }
    echo '</tr></thead>';

    echo '<tbody>';
    for ($j = 0; $j < $nb_row; ++$j)
    {
      echo '<tr class="ligne' . $j%2 . '">';
      for ($i = 0; $i < $nb_col; ++$i)
      {
        echo '<td>' . $_tableau['data'][$i][$j] . '</td>';
      }
      echo '</tr>';
    }
    echo '</tbody></table>';
    echo '<div id="view_form"></div><!--id="view_form"-->';

  } // View_tableau ()
  
   public function View_tableau2 ($_tableau, $mess)
  {
    $nb_col = count ($_tableau['head']);
	$nb_row = 0;
	if ($_tableau['data'])
	{
		$nb_row = count ($_tableau['data'][0]);
	}
	else
	{
		$nb_row = 0;
	}

    if (isset($_tableau['id_target'])) {
      $onclick = "contenu ('{$_tableau['id_target']}', '{$_tableau['url_new']}', '{$_tableau['param_new']}')";
      $button_new = '<button class="new" value="Nouveau" title="Nouveau" onclick="'.$onclick.'">Nouveau</button>';
    }
    else {
      $button_new = '';
    }
    $button_print = '<button class="print" onclick="print ()">Print</button>';
	//$message = '<label id="NosContacts">$mess</label>';

    echo '<table class="tableau">';
    echo "<caption>$button_new $button_print</caption>";
	
	echo '<thead class="message"><tr>';
	echo '<th id="mess">'.$mess.'</th>';
	for ($i = 1; $i < $nb_col; ++$i)
    {
      echo '<th class="bibi"> </th>';
    }
    echo '</tr></thead>';
	
    echo '<thead><tr>';
    for ($i = 0; $i < $nb_col; ++$i)
    {
      echo '<th class="pointer" onclick="tri_bulle (' . $i . ')">' . $_tableau['head'][$i] . '</th>';
    }
    echo '</tr></thead>';


    echo '<tbody>';
    for ($j = 0; $j < $nb_row; ++$j)
    {
      echo '<tr class="ligne' . $j%2 . '">';
      for ($i = 0; $i < $nb_col; ++$i)
      {
        echo '<td>' . $_tableau['data'][$i][$j] . '</td>';
      }
      echo '</tr>';
    }
    echo '</tbody></table>';
    echo '<div id="view_form"></div><!--id="view_form"-->';

  } // View_tableau2()

} // VTableau

?>
