// Analog Christmas


const ready = fn => document.readyState !== 'loading' ? fn() : document.addEventListener('DOMContentLoaded', fn);

//src: https://stackoverflow.com/a/24103596
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

ready(function(){
    // global variables from index.php
    cookie_val = getCookie(cookie_name)
    if(cookie_val)
        [window.token, window.signature] = cookie_val.split(cookie_split)
});


var token_infos = null; // only saving as cookie delayed, for DSGVO

new_token = async function(){
    if(!document.getElementById("token-field"))
        return;
    document.getElementById("token-field").value = "loading..."
    const response = await fetch("?new_token")
    token_infos = await response.json()
    document.getElementById("token-field").value = token_infos['token']
    //document.getElementById("registration").style.display = "block";
    
}

save_cookie = () => {
    setCookie(token_infos['cookie_name'], token_infos['cookie_value'], 2*60);
    // do not prevent default, continue submitting the form
    return true;
}

ready(function(){
    if(window.token) {
        if(document.getElementById("token-field"))
            document.getElementById("token-field").value = window.token;
    } else {
        new_token();
    }
   
    // Having fun with forms
    document.querySelectorAll('form.inplace').forEach(form => {
        form.setAttribute('hx-post', window.location.href);
        form.setAttribute('hx-target', 'this');
        form.setAttribute('hx-swap', 'inner');
        form.setAttribute('hx-indicator', '#spinner'); // Show a spinner during the request
        form.setAttribute('hx-select', 'form.inplace');
        htmx.process(form);
    });
    
    /*
    var swapform = document.getElementById('swapform')
    if(swapform)
      swapform.addEventListener('submit', function (event) {
        event.preventDefault();
        htmx.ajax('POST', window.location.href, { target: '#swapform', select: '#swapform', swap: 'inner', indicator: '#spinner' });
      });
    */
})
