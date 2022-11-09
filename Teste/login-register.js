function popup(popup_name)
{
  get_popup=document.getElementById(popup_name);
  if(get_popup.style.display=="flex")
  {
    get_popup.style.display="none";
  }
  else
  {
    get_popup.style.display="flex";
  }
}


function forgotPopup(){
  document.getElementById('login-popup').style.display="none";
  document.getElementById('forgot-popup').style.display="flex";
}