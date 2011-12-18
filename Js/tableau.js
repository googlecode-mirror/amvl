function save_photo (form)
{
  var frm = document.getElementById(form);
  if(verif_form(frm)) {
    frm.submit();
  }

} // save_produit (photo)

function insert_tr (photo)
{
  var tableau = document.getElementsByTagName ('table')[0];
  var tbody = tableau.getElementsByTagName ('tbody')[0];
  var tr = tbody.getElementsByTagName ('tr');
  var nb_tr = tr.length;

  var numline = nb_tr%2;

  var tr_clone = tr[numline].cloneNode (true);
  tr_clone.getElementsByTagName ('td')[0].innerHTML = photo.NOM;
  tr_clone.getElementsByTagName ('td')[1].innerHTML = photo.AUTEUR;

  tbody.appendChild (tr_clone);

} // modif_tableau ()

var type_tri='asc';
var col_tri=0;

function tri_bulle (col)
{
  var tableau = document.getElementsByTagName ('table')[0];
  var tbody = tableau.getElementsByTagName ('tbody')[0];
  var tr = tbody.getElementsByTagName ('tr');
  var nb_tr = tr.length;
  var text = new Array ();
  var trier = true;
  var tmp_text = null;
  var tmp_tr = null;
  var tr_clone = new Array ();

  col_tri=col;

  for (var i = 0; i < nb_tr; ++i)
  {
     text[i] = tr[i].getElementsByTagName ('td')[col].innerHTML;
     tr_clone[i] = tr[i].cloneNode (true);
  }

  for (i = 0; i < nb_tr && trier; ++i)
  {
    trier = false;
    for (var j = 1; j < nb_tr - i; ++j)
    {
      if (text[j] < text[j-1])
      {
        tmp_text = text[j-1];
        text[j-1] = text[j];
        text[j] = tmp_text;

        tmp_tr = tr_clone[j-1];alert (photo);

        tr_clone[j - 1] = tr_clone[j];
        tr_clone[j] = tmp_tr;

        trier = true;
      }
    }
  }

  for (var i = 0; i < nb_tr; ++i)
  {
     tbody.removeChild(tr[0]);
  }

  if ('desc' == type_tri)
  {
    for (var i = 0; i < nb_tr; ++i)
    {
      tr_clone[i].setAttribute('class', 'ligne' + i%2);
      tbody.appendChild (tr_clone[i]);
      type_tri = 'asc';
    }
  }
  else
  {
    for (var i = nb_tr - 1; i >= 0; --i)
    {
      tr_clone[i].setAttribute('class', 'ligne' + i%2);
      tbody.appendChild (tr_clone[i]);
      type_tri = 'desc';
    }
  }

} // tri_bulle ()
