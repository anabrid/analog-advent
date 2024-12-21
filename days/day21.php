<h1>Chanukah and Photonics</h1>

<section class="story">

<p>Helmi sat at her workbench, tinkering with a small, glowing module. A thought struck them: <em>Photonic computing.</em> The potential to process data at the speed of light had always intrigued them. As they mused, a nearby calendar caught her eye—The festival of lights, <em>Chanukah</em> didn’t begin until December 26 this year. Helmi laughed softly. “Who says I can’t get inspired early?”

<p>
They set aside the calendar and dove into her thoughts. Photonic computing, while promising, was still riddled with challenges. The materials were exotic, the fabrication complex, and it wasn’t clear how soon it could make a real impact. Helmi looked back at her sketches for analog processors on CMOS, noting her simplicity and practicality. “We don’t need to wait for photons,” they murmured. “Analog is already here, and it works.”

<p>
Helmi made a mental note: <em>Chanukah may be late this year, but the light can always inspire.</em>> With a smile, they focused on refining her CMOS-based analog designs, knowing that sometimes, the brightest ideas didn’t need to travel at the speed of light—they just needed to shine when the time was right.

</section>
<section class="challenge">

<p>Helmi discovered photonic computing, a powerful upcoming computer architecture.
There are many prejudices about light: Is photonics the ultimate computing technology?
Let's make the test:

<form method="post" class="inplace">
<?php
include 'formlib.php';

$quiz = new MultipleChoice("21");

$quiz->checkbox("Information can be only as fast as light.", true);
$quiz->checkbox("Matter can be as fast as light", false);
$quiz->checkbox("processing should be done in light.", "both");
$quiz->checkbox("Information transport should be done in light.", true);
$quiz->checkbox("Storage should be done in light (i.e. we can store photons).", false);
$quiz->checkbox("Optical computing needs special relativity to be described correctly", "both");
$quiz->checkbox("Optical computing needs general relativity to be described correctly", false);
$quiz->checkbox("Serial computing at the speed of light is faster then parallel computing at the speed of electrons", "both");

$quiz->print();
if($quiz->user_data) {
?>

<p class="info">
In fact, optical and traditional information processing are already mixed today. Photonic computing
tries to move the boundaries from PCB towards on-chip and from transport to processing. This is
somewhat similar as our non-photonoic classical analog computing wants to move boundaries. Certainly,
mixing novel materials within the analog soup can make a big difference.
</p>

<?php 

}
$quiz->hand_in();

?>
</form>

</section>
