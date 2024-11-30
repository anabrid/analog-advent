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

<noscript>
    <p><b>Attention</b>: The Advent calendar uses JavaScript for user managament. Sorry, without javascript
       you cannot participate in the price draw!</p>
</noscript>

<p>In order to take part in the quizzes (they are always resolved on the following day), your computer is automatically assigned an identifier token:

<form method="post" onsubmit="save_cookie();">

<p style="text-align:center">

    <input type="text" id="token" value="loading..." readonly>
    <button id="refresh-token" onclick="if(confirm('Are you sure you want to wipe your token and assign a new one? This deletes all your replies and cannot be undone. Maybe save your old token first.')) new_token(); return false;">Assign another token</button>

</p>

<div id="registration">

<p>If you want to take part in the prize draw, we need your contact details. Otherwise, please leave the following field empty.

<textarea class="block" id="address" placeholder="Provide your name and a way how we can contact you. This can be an email address, a social media handle, a phone number or postal address, depending on your preference."></textarea>

<p style="font-size:75%; line-height: 130%;">
By participating, you agree to <a href="https://en.wikipedia.org/wiki/General_Data_Protection_Regulation">GDPR</a>/<a href="https://de.wikipedia.org/wiki/Datenschutz-Grundverordnung">DSGVO</a>. A cookie will be stored on your computer allowing you to track your replies, surviging 60 days. Replies and the token are stored on our server. This allows us to do statistics on the participant results and to rank participation. Legal recourse is excluded with regard to the competition. Anabrid employees and relatives can do the quizzes but are excluded from the competition. Sorry guys.
</p>

<div style="text-align:center">
    <button style="font-size: 150%" type="submit">Register</button>
</div>

</div><!--/registration -->

</form>

</section>

<script>

var token_infos = null; // only saving as cookie delayed, for DSGVO

new_token = async function(){
    document.getElementById("token").value = "loading..."
    const response = await fetch("?new_token")
    token_infos = await response.json()
    document.getElementById("token").value = token_infos['token']
    document.getElementById("registration").style.display = "block";
    
}

save_cookie = () => {
    setCookie(token_infos['cookie_name'], token_infos['cookie_value'], 2*60);
    // do not prevent default, continue submitting the form
}

ready(function(){
    if(window.token) {
        document.getElementById("token").value = window.token;
        document.getElementById("registration").style.display = "none";
    } else {
        new_token();
    }
})

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
