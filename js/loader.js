/**
 * Fichier Javascript appelant tous les autres fichiers
 * @author Christian Bonhomme
 * @version 1.0
 * @package json
 */

var src = new Array();
var i = 0;

src[i++] = '../Js/select.js';
src[i++] = '../Js/form.js';
src[i++] = '../Js/ajax.js';
src[i++] = '../Js/init.js';

for (var j = 0; j < i; ++j)
{
  document.write('<script language="javascript" type="text/javascript" src="' + src[j] + '"></script>');
}
