<?php

if(!session_id()){
  session_start();
}

require_once ('inc/require.inc.php');
require_once ('inc/mail.inc.php');

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

  global $content;

  $content['title'] = 'CatClinic';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';

  if(isset($_GET['switch'])){

    if($_GET['switch'] !== "false") {

      if(!isset($_SESSION['login'])){

        $_SESSION['login'] = $_GET['switch'];

      }

      $content['arg'] = 'html/accueil.html';

    }else{

      $content['arg'] = 'html/connexion.html';

    }

    include 'view/layout.view.php';

    return;

  }else{

    if (isset($_SESSION["login"])) {

      if ($_SESSION["login"] === "root") {

        $vhtml->showHtml('html/root.php');

      }else {

        $vhtml->showHtml('html/administration.php');

      }

    }else{

      $vhtml->showHtml('html/connexion.html');

    }

    return;
  }
}

function modiffiche()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('html/modiffiche.php');

  return;

}

function ajoutfiche()
{
  $vhtml = new VHtml();
  $vhtml->showHtml('html/ajoutfiche.html');

  return;

}

?>
