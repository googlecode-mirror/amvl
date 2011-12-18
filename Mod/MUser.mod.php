<?php

// Permet de gérer l'utilisateur
class MUser
{
  private $conn;
  private $user;
  private $row;
  private $value;

  // constructeur
  function __construct ()
  {
    $this->conn = mysql_connect (HOST, LOGIN, PASSWORD);
	mysql_select_db(DATABASE) or die( "Unable to select database");
	
	//test
	//print_r($this->conn);
    // On utilise les sessions
    session_start ();

    if ($this->IsConnected()) {
      $query = "select LOGIN,
                       PSSWD,
                       PROFIL
                from PH_ADMIN
                where ID_ADMIN = ".intval($_SESSION['uid']);

      unset ($this->user);
	  $allres = array();
      $result = mysql_query($query);
      //mysql_fetch_all ($result, $this->user, null, null, MYSQL_FETCHSTATEMENT_BY_ROW);
      while ($row = mysql_fetch_assoc($result)) {$allres[] = $row;}
	  $this->user = $allres;
	  $this->user = $this->user[0];
    }

  } // __construct()

  // destructeur
  function __destruct ()
  {
	//test pour la fermeture de la connexion à la base de donnée
	//print_r($this->conn);
    //mysql_close ($this->conn);
  } // __destruct()

  // Générer un sel
  function Salt ()
  {
    mt_srand();
    $_SESSION['salt'] = mt_rand();
    return $_SESSION['salt'];

  } // Salt()

  function VerifLogin ($login)
  {
	$query = "select COUNT(*) from ph_admin where login = '".$login."'";
	$result = mysql_query($query);
	$truelog = mysql_fetch_array ($result);
	
	return $truelog[0];
  }
  
  //inscrire l'utilisateur
  function Inscription ($login, $entreprise, $password, $email)
  {
  	$query = "select max(id_admin) from ph_admin";
	$result = mysql_query($query);
    $maxid = mysql_fetch_array ($result);	
	$maxid[0] = $maxid[0] + 1;
	
	$query = " insert into PH_ADMIN
			   values ( ".$maxid[0].",'".$login."', '".$entreprise."', '".md5($password)."', '".$email."', DEFAULT )";
	$result = mysql_query($query);
	 
  }//Inscription()
  
  // Connecter l'utilisateur
  // Retourne true ou false
  function Connect ($name, $pwd)
  {
    // Récupérer les données utilisateur
    $query = "select ID_ADMIN,
                     LOGIN,
                     PSSWD,
                     PROFIL
              from PH_ADMIN
              where LOGIN like '".str_replace('\'', '\'\'', $name)."'";

    unset ($this->user);
	$allres = array();
    $result = mysql_query($query);
    //mysql_fetch_all ($result, $this->user, null, null, MYSQL_FETCHSTATEMENT_BY_ROW);
	while ($row = mysql_fetch_assoc($result)){$allres[] = $row;}
	$this->user = $allres;
    // Vérifier le nom
    if (!(isset($this->user[0]))) return false;
    $this->user = $this->user[0];

    if ( isset($_SESSION['salt']) ) {
        $this->user['PSSWD'] = md5( $this->user['PSSWD'] . $_SESSION['salt'] );
    }

    // Vérifier le password
    if ( $this->user['PSSWD'] != md5($pwd) ) return false;

    // Connecté!
    $_SESSION['uid'] = $this->user['ID_ADMIN'];

    return true;

  } // Connect()

  // Déconnecter l'utilisateur
  function Disconnect ()
  {
    session_unset();
    session_destroy();

  } // Disconnect()

  // Vérifier que l'utilisateur soit connecté
  function IsConnected ()
  {
    return isset( $_SESSION['uid'] );

  } // IsConnected()

  function IsAdmin ()
  {
    return $this->IsConnected() && ($this->user['PROFIL'] == 99999999);
  } // IsAdmin()
  
    function IsDownloader ()
  {
    return $this->IsConnected() && ($this->user['PROFIL'] > 0);
  } // IsAdmin()
  
}; // class MUser

?>