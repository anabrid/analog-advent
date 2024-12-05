<h1>Medtech</h1>

<section class="story">

<img src="graphics/canva06.jpg" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">

<p>Helmi sat by Santa’s armchair, her brow furrowed as his trembling hands gripped the armrests. His iconic red hat wobbled with every shake, and his foot tapped the floor, sending ornaments rattling. “It’s getting worse,” she murmured. The doctor elves had diagnosed him with a magical form of tremor, worsened by holiday stress. The digital brain pacemaker they tried faltered, lagging behind Santa’s magic-infused neural rhythms and draining its battery far too quickly. “This won’t do,” Helmi muttered, setting the device aside.

<p>Determined to find a solution, she crafted an analog brain pacemaker—a device tuned to work seamlessly with Santa’s unique biology, using oscillators and fluidic circuits to adapt instantly without power drain. Once attached behind Santa’s ear, the trembling stopped almost immediately. Santa flexed his hands, his smile returning. “Helmi, you’ve done it!” he said, his voice steady and clear. Helmi grinned, knowing analog had once again saved Christmas.
</section>

<section class="challenge">

<p>Helmi unlocked the future of medical technology: smart sensors capable of processing information directly, without the inefficiencies of digital conversion. Tackling Deep Brain Stimulation as her first project was no small feat, but the potential savings in energy and performance are staggering, aren’t they? Take a guess:


<form method="post" id='swapform'>
<?php
include 'formlib.php';

$quiz = new MultipleChoice("6");
$quiz->checkbox("Does it save energy through analog processing?", true);
$quiz->checkbox("Does it enable smaller implants?", true);
$quiz->checkbox("Does it eliminate the need for batteries in the chest?", true);
$quiz->checkbox("Does it avoid the need for closed-loop systems?", "both"); // N/A
$quiz->checkbox("Does it improve patient-specific customization?", true);
$quiz->checkbox("Does it reduce heat generation in tissue?", true);
$quiz->checkbox("Can it process signals more efficiently?", true);
$quiz->checkbox("Is it less flexible than digital systems?", "both"); // not really
$quiz->checkbox("Does it support real-time feedback integration?", true); // programmable chips
$quiz->checkbox("Is it more susceptible to noise?", false);

$quiz->print();

if($quiz->user_data) {
?>

<p class="info">
Analog Deep Brain Stimulation (DBS) offers transformative advantages, including energy efficiency, smaller implant sizes, and reduced heat generation, enabling integration without a chest battery. The technology supports real-time feedback and patient-specific customization, especially when enhanced by Anabrid’s hybrid analog-digital processors, which overcome the limitations of purely analog systems. Contrary to common misconceptions, analog systems are not inherently more noise-prone when properly designed. By combining the strengths of analog efficiency and digital flexibility, this approach sets a new standard for streamlined and effective DBS technology.
</p>

<?php
} // solution

$quiz->hand_in();

?>
</form>

</section>
