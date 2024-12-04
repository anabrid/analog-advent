<h1>Counting or Measuring</h1>

<section class="story">

<img src="graphics/dalle2.webp" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">


<p>Christmas time begins with an inventory of the reindeer fleet. Helmi scratched her head, eyeing the bustling reindeer with growing skepticism. Santa had insisted on expanding the herd this year once again. Counting them individually had proven tedious, and multiplying stables by boxes felt far too theoretical for the chaos at hand. Instead, she wheeled out the trusty weighing machine—a beautifully intricate device with a large, circular scale and a needle that danced with every shift of weight. Helmi set it just outside the gate and sprinkled a trail of oats to coax the reindeer through, one by one. As they trotted onto the platform, the needle swung and settled, tallying the collective weight of the herd. Helmi jotted down the reading and grinned. “Twelve reindeer, each 100 pounds, together 1,205 pounds,” she mused, the math now undeniable. The reindeer themselves seemed pleased, snorting approval at her analog ingenuity.

<!--
There were three stables, each with four hay-lined boxes. “Twelve,” Helmi calculated quickly, multiplying stables by boxes. But was that the real count? The reindeer themselves seemed unconvinced, their bells jingling in disarray. Helmi set up the trusty analog counter at the stable gate—a spinning wheel of brass levers that clicked with each pass. He flung the gate open, and the reindeer thundered through, each adding its weight to the counter’s tally. The brass clicked precisely twelve times. “Good job, team,” Helmi grinned. “You did the math for me.”
-->

</section>

<section class="challenge">
<p>Helmi used a trick: He did not do the slow and error-prone arithmetics himself, for instance by  multiplying stables by boxes. Instead, he let the reindeers do the math for him, just by reading off the scale at a single time once the herd was in place. Measuring instead of computing is very powerful. What statements can you make about the properties of this computational approach?

<form method="post" id='swapform'>
<?php
include 'formlib.php';

$quiz = new MultipleChoice("2");
$quiz->checkbox("reversible", true);
$quiz->checkbox("based on measurement", true);
$quiz->checkbox("exact",      false);
$quiz->checkbox("continous",  "both"); # both is true
$quiz->checkbox("fast",       true);

$quiz->print();

if($quiz->show_solution) {
?>

<p class="info">We have seen computing by analogy, since the scale is just summing numbers. This is not
so exact, but very fast. It can work with both discrete (such as reindeers) and continous
quantities (such as estimating and "adding" the water in a a bucket).</p>

<?php
} // solution

$quiz->hand_in();
?>

</form>

</section>
