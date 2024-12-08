<h1>Weather simulation (Analog HPC)</h1>

<section class="story">

<p>The North Pole’s High-Performance Computing (HPC) center buzzed with activity as Helmi stared at the monitors. Weather forecasts for Christmas Eve—critical for sleigh navigation—were trickling in at a snail’s pace, lagging hours behind real-time conditions. “This won’t cut it,” Helmi muttered, shaking their head as yet another snowstorm’s trajectory failed to compute on time. The digital systems were powerful but glacially slow when it mattered most, guzzling energy like an overheating toy train.

<p>Helmi rolled up their sleeves and headed to the lab. Using fluid dynamics principles and analog components, they designed a supercomputer that mimicked the very essence of weather patterns. By directly simulating airflows, pressures, and temperatures through mechanical and electrical systems, the analog supercomputer crunched forecasts in mere seconds—orders of magnitude faster than digital models. Best of all, it was 10 million times more energy-efficient.

<p>By nightfall, the prototype was humming away, predicting weather shifts with uncanny accuracy. Helmi grinned as they watched the storm patterns align on the display. “No delays, no wasted energy—just pure, analog brilliance,” they said, jotting a note for Santa. “Weather won’t stand in our way this year.”

</section>

<section class="challenge">

<p>Helmi greatly improved the efficiency of the computing center. However, there is an economical effect which will happen that Helmi probably did not think about. Which one of the following four options do you think will happen?

<form method="post" id='swapform'>
<?php
include 'formlib.php';

$quiz = new SingleChoice("9");

$quiz->correct_solution = "C";

$quiz->opening();

$quiz->option("A", "Fewer computations are performed due to efficiency.");
$quiz->option("B", "The same number of computations are performed at reduced cost.");
$quiz->option("C", "More computations are performed within the fixed pricing constraints.");
$quiz->option("D", "Computations remain constant regardless of efficiency improvements.");

if($quiz->user_data) {
?>

<p class="info">
Correct is option <?php echo $quiz->correct_solution; ?>.
The phenomenon which is happening is called <em>Rebound Effect</em>, also called
Jevens Paradoxon. Since the computing center already runs with a given cost structure, the more efficient
computing will not reduce the total operating costs but make more computations available for the same operating
costs. Translated to energy this means the computing center will not decrease its power consumption but remain
stable. The same is true for CO2 emissions!</p>

<?php
} // solution

$quiz->hand_in();
?>
</form>

</section>
