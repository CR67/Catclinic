<?php
/**
 * Boîtes à outils
 * @author Christian Bonhomme
 * @version 1.0
 * @package Json
 */

/**
 * Chargement automatique des class
 * @param string class appelée
 *
 * @return none
 */
function __autoload($class)
{
  // Inclusion des class de type Vue
  require_once('../View/'.$class.'.view.php');
  
  return;

} // __autoload($class)
?>