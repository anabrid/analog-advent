<h1>Welcome</h1>

<section class="story">

<img src="graphics/dalle1.webp" id="fig" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">

<style>
#fig {
    width: 100%; padding: 2em 0;
}

@media (min-width: 768px) {
 #fig {  float:right; width: 30vw; max-width: 500px; padding: 0; }
}
</style>

<p>Welcome to the North Pole, where the countdown to Christmas has begun, the air buzzes with the hum of bustling elves and the almost magical ticking machines. Meet our protagonist: A clever, overworked yet determined elf named Helmi. Helmi isn't just any elf; he's the one who keeps the whole operation from unraveling while Santa leans back in his rocking chair. Helmi is surrounded by a sea of problems: broken gift sorters, tangled communication systems, and a looming energy crisis from the overworked workshop grid. As the days tick by, Helmi must not only untangle the chaos but also uncover ingenious solutions-involving the latest trends in computing. Together, you'll join Helmi's journey, solving one problem at a time, and maybe even uncovering a few secrets about the magic that keeps Christmas alive.

</section>

<section class="challenge">
<p>We are giving away one <b><a href="https://the-analog-thing.org">THE ANALOG THING</a></b> analog computer among all participants. The prize draw and announcement will take place on Christmas Eve. In order to take part in the prize draw, it is necessary to answer the quizzes regularly.

<p>In order to take part in the quizzes (they are always resolved on the following day), your computer is automatically assigned an identifier token:

<form method="post" onsubmit="save_cookie();">

<p style="text-align:center">

<input type="text" id="token" readonly> <button id="refresh-token" onclick="new_token(); return false;">Assign another token</button>

</p>

<p>If you want to take part in the prize draw, we need your contact details. Otherwise, please leave the following field empty.

<textarea class="block" id="address" placeholder="Provide your name and a way how we can contact you. This can be an email address, a social media handle, a phone number or postal address, depending on your preference."></textarea>

<p style="font-size:75%; line-height: 130%;">
By participating, you agree to <a href="https://en.wikipedia.org/wiki/General_Data_Protection_Regulation">GDPR</a>/<a href="https://de.wikipedia.org/wiki/Datenschutz-Grundverordnung">DSGVO</a>. A cookie will be stored on your computer allowing you to track your replies, surviging 60 days. Replies and the token are stored on our server. This allows us to do statistics on the participant results and to rank participation. Legal recourse is excluded with regard to the competition. Anabrid employees and relatives can do the quizzes but are excluded from the competition. Sorry guys.
</p>

<div style="text-align:center">
    <button style="font-size: 150%" type="submit">Register</button>
</div>
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
