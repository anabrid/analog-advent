<h1>Cloud Computing</h1>

<section class="story">

<img src="graphics/canva03.jpg" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">

<p>Helmi frowned as she gazed up at the shimmering clouds above the workshop. These weren’t ordinary clouds—they were Santa’s enchanted highways, carrying sleigh routes, wishlist data, and even toy schematics across the globe. But today, they seemed restless, their edges fraying and dripping with silvery mist. “Too leaky, too unsafe, and definitely too expensive,” Helmi muttered, her analog barometer confirming the instability. Santa had relied on these magical clouds for years, but Helmi knew their flaws: outages during snowstorms, data lost to the wind, and sky-high energy costs. “We need computation on the ground,” she decided, eyeing the trusty, local peppermint processors in the workshop. “If Santa wants a secure Christmas, he needs to keep things off the clouds or he needs to go beyond digital processing.” Above, the swirling formations seemed to grumble, as if sensing the end of their reign.

</section>

<section class="challenge">

<p>What is the principle Helmi found to be neccessary for the next level of computing?


<form method="post" class="inplace">
<?php
include 'formlib.php';

$quiz = new MultipleChoice("4");
$quiz->checkbox("Real local on-device computation", true);
$quiz->checkbox("Well the edge is better then nothing, isn't it?", "both");
$quiz->checkbox("Compute Cloud's are fine but just need to go beyond digital processing",  true);

$quiz->print();

$quiz->hand_in();
?>
</form>

</section>
