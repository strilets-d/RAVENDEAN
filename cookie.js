function setCookie() {

  var expire = new Date();
  expire.setHours(expire.getHours() + 4);

  var inp=document.getElementById('Email');
    document.cookie = 'email' + "=" + inp.value+';expires=' + expire.toUTCString() + ";";
 document.cookie='entr=on';
    }

  
function getCookie(name) {
    var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
    if (r) return r[2];
    else return '';                                               //функція для отримання куків за назвою
  }

window.onload=function(){
  zmina();
}
function zmina(){
  if(getCookie('entr')=="on"){
   document.getElementById("log").innerHTML=getCookie('email');         //функція для взміни аккаунта
   document.getElementById('log').href="cabinet.php";
   document.getElementById('out').style.display='inline-block';
}
else{
document.getElementById("log").innerHTML="Увійти ";
document.getElementById('out').style.display='none';
document.getElementById('log').href="login.php";
 }
}
 function vuhid(){                                            //функція для виходу з аккаунта
 document.cookie='entr=off';
 }

 function sss(){
  
 }


