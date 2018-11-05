function setCookie() {

  var expire = new Date();
  expire.setHours(expire.getHours() + 4);

  var inp=document.getElementById('Email');
    document.cookie = 'email' + "=" + inp.value+';expires=' + expire.toUTCString() + ";";
 document.cookie='entr=on';
    }

function getCookie(){
	var expire = new Date();
	var inp=document.getElementById('Email');
}