<?php
// Récupération de l'autoload
require ('../Inc/require.inc.php');

// Récupération de la variable de contrôle
$EX = isset ($_REQUEST['EX']) ? $_REQUEST['EX'] : 'accueil';

// Contrôleur
switch ($EX)
{
  case 'accueil': accueil(); break;
  case 'conseils': conseils(); exit;
  case 'contacts': contacts();  exit;
}

// Récupération de la mise en page
require('../View/layout.view.php');

function accueil()
{
  global $content;

  $content['title'] = 'CatClinic';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = '../html/accueil.html';
  
  return;
  
}

function conseils()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('../html/conseils.html');

  return;
  
}

function contacts()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('../html/contacts.html');
  
  return;
  
}
?>