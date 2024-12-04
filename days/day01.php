<h1>Welcome</h1>

<section class="story">

<img src="graphics/dalle1.webp" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">


<p>Welcome to the North Pole, where the countdown to Christmas has begun. The air buzzes with the hum of bustling elves and the almost magical ticking machines. Meet our protagonist: A clever, overworked yet determined elf named Helmi. She isn't just any elf; she's the one who keeps the whole operation from unraveling while Santa leans back in his rocking chair. Helmi is surrounded by a sea of problems: broken gift sorters, tangled communication systems, and a looming energy crisis from the overworked workshop grid. As the days tick by, Helmi must not only untangle the chaos but also uncover ingenious solutions-involving the latest trends in computing. Together, you'll join Helmi's journey, solving one problem at a time, and maybe even uncovering a few secrets about the magic that keeps Christmas alive.

</section>

<section class="challenge">
<p>We are giving away one <b><a href="https://the-analog-thing.org">THE ANALOG THING</a></b> analog computer among all participants. The prize draw and announcement will take place on Christmas Eve. In order to take part in the prize draw, it is necessary to answer <del>the quizzes regularly</del> <em>the majority of quizzes</em>.

<?php

if(!$token) {

?>
You are invited to register in order to participate:
</p>


<div style="text-align:center">
    <button style="font-size: 150%" onclick="location.assign('?user')">Register</button>
</div>

<?php
}else{
?>

</p>
<p class="info">You are already registered as <em><?php echo $token ?></em>.</p>

<?php } ?>

</section>
