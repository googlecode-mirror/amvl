<?php

class VHtml
{
  public function __construct () {}

  public function __destruct () {}

  public function View_html ($_file)
  {
    if (is_file("../Html/$_file"))
    {
      require ("../Html/$_file");
    }
    else
    {
      require ("../Html/unknow.html");
    }

  } // view_Html

} // VHtml

?>
