/**
 * Initialisation des écouteurs
 * @author Christian Bonhomme
 * @version 1.0
 * @package Json
 */

/**
 * Fonction générique de déclenchement des listeners
 * @param HTMLElement element à écouter
 * @param array tableau des objets de type événement
 * @param function fonction déclenchée par l'écouteur
 *
 * @return none
 */
function Listener(elem ,event, fnct) 
{
  if (elem)
  {
    // Teste si la méhode addEventListener existe (Non IE)
    if (elem.addEventListener)
    {
      // Associe à  l'événement click la fonction (Non IE)
      elem.addEventListener(event , fnct, false);
    }
    else
    {
      // Associe à  l'événement onclick la fonction  (IE)
      elem.attachEvent('on' + event, fnct);
    }
		
    // Si l'événement est un click on change le curseur de souris
    if ('click' == event) 
    { 
      elem.style.cursor = 'pointer';
    }
  }
  
  return;
    
} // Listener(elem ,event, fnct)

/**
 * Gestion du click sur les boutons
 */
var click_button = document.getElementById('entete').getElementsByTagName('button');
var nb_buttons = click_button.length;
for (var i = 0; i < nb_buttons; ++i)
{
  Listener(click_button[i], 'click', Tviews[i])
}

/**
 * Fonction d'arrêt de la propagation d'un événement dans la phase de bouillonnement
 * @param event événement
 *
 * return none;
 */
function stopEvent(event)
{
  // Teste si la méthode stopPropagation existe (Non IE)
  if (event.stopPropagation)
  {
    // Stoppe la propagation de l'événement (pas de bouillonnement)
    event.stopPropagation();
    // Remet l'événement à false
    event.preventDefault();
  }
  else
  {
    // Stoppe la propagation de l'événement (pas de bouillonnement)
    event.cancelBubble = true;
    // Remet l'événement à false
    event.returnValue = false;
  }
  
  return;

} // stopEvent(event)
