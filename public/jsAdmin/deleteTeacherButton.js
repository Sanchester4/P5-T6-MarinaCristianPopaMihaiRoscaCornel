var elementList = document.querySelector(".w3-bar");


function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
     {
     elementList.style.display = 'none';
    return true;
}
  else
    return false;
}