<?php
/**
 * Fichier du contrôleur
 * @author Christian Bonhomme
 * @version 1.0
 * @package Json
 */
 
/**
 * Classe pour l'affichage de l'entête
 */
class VHeader
{
  /**
   * Constructeur de la classe VHtml
   * @access public
   *        
   * @return none
   */
  public function __construct(){}
  

  /**
   * Destructeur de la classe VHtml
   * @access public
   *
   * @return none
   */
  public function __destruct(){}
  
  /**
   * Affichage de l'entête
   * @access public
   *
   * @return none
   */
  public function showHeader()
  {
    $vhtml = new VHtml();
    $vhtml->showHtml('../html/header.html');

    return;
    
  } // showHeader()
  
} // VHeader
?>