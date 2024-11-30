<h1>Welcome</h1>

<section class="story">

<p>Welcome to the North Pole, where the countdown to Christmas has begun, the air buzzes with the hum of bustling elves and the almost magical ticking machines. Meet our protagonist: A clever, overworked yet determined elf named Helmi. Helmi isn't just any elf; he's the one who keeps the whole operation from unraveling while Santa leans back in his rocking chair. Helmi is surrounded by a sea of problems: broken gift sorters, tangled communication systems, and a looming energy crisis from the overworked workshop grid. As the days tick by, Helmi must not only untangle the chaos but also uncover ingenious solutions-involving the latest trends in computing. Together, you'll join Helmi's journey, solving one problem at a time, and maybe even uncovering a few secrets about the magic that keeps Christmas alive.

</section>

<section class="challenge">
<p>We are giving away one <b>THE ANALOG THING</b> analog computer among all participants. The prize draw and announcement will take place on Christmas Eve. In order to take part in the prize draw, it is necessary to answer the quizzes regularly. Your computer is currently assigned this token:

<form method="post" onsubmit="save_cookie();">
<p><input type="text" id="token" readonly> <button id="refresh-token" onclick="new_token();">Assign another token</button>

<p>In the event that you have been drawn, we need your contact details.

<textarea id="address" placeholder="Please provide your name, an email address, phone number or full postal address"></textarea>

<p>By participating, you agree to DSGVO. A cookie will be stored on your computer allowing you to track your replies. The cookie lifetime is 60 days. Furthermore, your replies and the token will be stored on our server so we can decide whether you participated regularly and therefore are elgable to participate in the contest.

<button type="submit">Register</button>
</form>

</section>

<script>

const ready = fn => document.readyState !== 'loading' ? fn() : document.addEventListener('DOMContentLoaded', fn);

var token_infos = null; // only saving as cookie delayed, for DSGVO

new_token = async function(){
    document.getElementById("token").value = "loading..."
    const response = await fetch("?new_token")
    token_infos = await response.json()
    document.getElementById("token").value = token_infos['token']
    
}

ready(new_token);

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

save_cookie = () => {
    setCookie(token_infos['cookie_name'], token_infos['cookie_value'], 2*60);
    // do not prevent default, continue submitting the form
}

</script>

<?php

// most work is done by users.php

if(!$token) {
    echo "Illegal token. Only tokens signed by server are accepted.";
    exit;
}

if(isset($_POST['address'])) {
    // Store this user in a file...
}

?>
