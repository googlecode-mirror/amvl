<?php

// Classe pour gérer les amv avec la base de donnée
class MAmv
{
  private $conn;
  private $the_values;
  private $value;
  private $row;
	 // constructeur
  function __construct ()
  {
    $this->conn = mysql_connect (HOST, LOGIN, PASSWORD);
	mysql_select_db(DATABASE) or die( "Unable to select database"); 

  } // __construct()

  // destructeur
  function __destruct ()
  {
    mysql_close ($this->conn);
  } // __destruct()
  
  function Select_All()
  {
	$query = "select ID_AMV,
					NOM,
					AUTEUR,
					IMG,
					MUSIQUE,
					VISIBLE,
					ID_CAT
				from ph_amv";
				
	unset ($this->the_values);
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_assoc($result)) {$allres[] = $row;}
	$this->the_values = $allres;
	
    return $this->the_values;	
  }
  
  function Select_All_Visible()
  {
	$query = "select ID_AMV,
					NOM,
					AUTEUR,
					IMG,
					MUSIQUE,
					ID_CAT
				from ph_amv
				where VISIBLE = 1";
				
	unset ($this->the_values);
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_assoc($result)) {$allres[] = $row;}
	$this->the_values = $allres;
	
	return $this->the_values;	
  }
}; // class MAmv

?>