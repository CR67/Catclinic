<?php

class VHeader
{

  public function __construct(){}

  public function __destruct(){}

  public function showHeader()
  {
    $vhtml = new VHtml();
    $vhtml->showHtml('html/header.html');

    return;
    
  }
  
}
?>