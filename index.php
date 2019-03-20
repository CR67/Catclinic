<?php

require ('inc/require.inc.php');

$EX = isset ($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';

switch ($EX)
{
  case 'home': home(); break;
  case 'accueil': accueil(); exit;
  case 'conseils': conseils(); exit;
  case 'contacts': contacts();  exit;
  case 'administration': administration(); exit;
  case 'modiffiche': modiffiche(); exit;
  case 'ajoutfiche': ajoutfiche(); exit;
}

require('view/layout.view.php');

function home()
{
  global $content;

  $content['title'] = 'CatClinic';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = 'html/accueil.html';
  
  return;
  
}

function accueil()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('html/accueil.html');

  return;

}

function conseils()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('html/conseils.html');

  return;
  
}

function contacts()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('html/contact.html');
  
  return;
  
}

function administration()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('html/administration.html');

  return;

}

function modiffiche()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('html/modiffiche.html');

  return;

}

function ajoutfiche()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('html/ajoutfiche.html');

  return;

}

?>
