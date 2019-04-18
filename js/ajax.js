/**
 * Fonctions javascript utilisant les appels aux serveur http
 * @author Christian Bonhomme
 * @version 1.0
 * @package json
 */
var DEBUG_AJAX = false;
/**
 *  Connexion au serveur http
 *
 *  @return string Connexion
 */
function getXhr()
{
  var xhr;
  if (window.XMLHttpRequest)         // Firefox et autres
  {
    xhr = new XMLHttpRequest();
  }
  else if (window.ActiveXObject)     // Internet Explorer
  {
    try
    {
      xhr = new ActiveXObject("Msxml2.XMLHTTP"); // IE version > 5
    }
    catch (e)
    {
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  else // XMLHttpRequest non supporté par le navigateur
  {
    alert("Votre navigateur ne supporte pas les objets XMLHttpRequest !");
    xhr = false;
  }

  return xhr;

} // getXhr ()

/**
 * Modification du contenu d'un élément en mode asynchrone
 * @param string identifiant de l'élément à modifier
 * @param string programme de modification
 * @param string paramètres de modification
 * @param string programme d'appel après la modification
 *  
 * @return none
 */
var elem = 'menu-accueil';

function changeContent(iddiv, idbutton, url, param, callback)
{
    // Modifie la classe des boutons du menu de navigation principal afin de les rendre "actifs" ou non ce qui permet de leur appliquer le bon style css
  if(idbutton !== 'null'){
    document.getElementById(elem).classList.remove('is-active');
    elem = idbutton;
    document.getElementById(idbutton).classList.add('is-active');
  }

  if(iddiv && url && param){
    // Récupère l'élément cible dont l'identifiant vaut id
    var c = document.getElementById(iddiv);

    // Met une image animée afin de montrer le chargement en cours du contenu
    //c.innerHTML = '<img src="../Img/loading.gif" alt="Chargement" />';

    //Récupère la connexion au serveur http
    var xhr = getXhr();

    // Ouvre la connexion en mode asynchrone avec le serveur http avec comme adresse url
    xhr.open('POST', url, true);

    // Envoie des entêtes pour l'encodage
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    //Envoie les paramètres param (même vide)
    xhr.send(param);

    // Exécution en mode asynchrone de la fonction anonyme dès que l'on obtient une réponse du serveur http
    xhr.onreadystatechange = function() {
      // Debuggage
      if (DEBUG_AJAX) alert(xhr.responseText);

      // Test si le serveur a tout reçu (200) et que le serveur ait fini (4)
      if (xhr.status == 200 && xhr.readyState == 4) {
        // Modifie l'élément ayant pour identificateur id suivant le programme url
        c.innerHTML = xhr.responseText;

        //Test s'il y a une callback
        if (callback != null) {
          // Exécution du script contenu dans la callback
          window.eval(callback);
        }

        // Si on a du javascript dans le nouveau contenu on identifie les scripts et on force l'éxécution avec eval()
        var allscript = c.getElementsByTagName('script');
        for (var i = 0; i < allscript.length; ++i) {
          // Exécution du script
          window.eval(allscript[i].text);
        }
      }
    }
  };
  
  return;

} // changeContent(id, url, param, callback)

/**
 * Récupération d'une action (d'un formulaire) en mode synchrone au format json
 * @param string programme de modification
 * @param string paramètres de modification
 *  
 * @return string json
 */
function actionParam(url, param)
{
  // Récupère la connexion au serveur http
  var xhr = getXhr ();

  // Ouvre la connexion en mode synchrone avec le serveur http à l'adresse url
  xhr.open('POST', url, false);

  // Envoie des entêtes pour l'encodage
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

  //Envoie les paramètres param
  xhr.send(param);
  
  // Debuggage
  if (DEBUG_AJAX) alert(xhr.responseText);

  // La réponse  au format json devient un objet javascript
  return JSON.parse(xhr.responseText);

} // actionParam(url, param)

/**
 * Récupération d'une action (d'un formulaire) en mode synchrone au format json
 * @param string programme de modification
 * @param string paramètres de modification
 *  
 * @return string json
 */
function actionForm(url, frm, name)
{
  // Récupère la connexion au serveur http
  var xhr = getXhr ();

  //Ouvre la connexion en mode synchrone avec le serveur http à l'adresse url
  xhr.open('POST', url, false);

  //Récupère les données du formulaire sous la forme clef/valeur
  var data = new FormData(frm);

  // Envoie les données du formulaire
  xhr.send(data)
  
  // Debuggage
  if (DEBUG_AJAX) alert(xhr.responseText);

  // La réponse  au format json devient un objet javascript
  return JSON.parse(xhr.responseText);

} // actionForm(url, frm, name, value)

function showFiche(index) {
  if (index == "aucun") {
    document.getElementById("editeur").innerHTML = "";
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("editeur").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","./inc/getfiche.inc.php?index="+index,true);
    xmlhttp.send();
  }
}
