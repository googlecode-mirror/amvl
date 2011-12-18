var src = new Array();
var i=0;

src[i++] = '../Js/tableau.js';
src[i++] = '../Js/form.js';
src[i++] = '../Js/ajax.js';


for (var j = 0; j < i; ++j)
{
  document.write('<script type="text/javascript" src="'+src[j]+'"></script>');
}
