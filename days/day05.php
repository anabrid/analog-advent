<h1>IoT Sensors</h1>

<section class="story">

<img src="graphics/canva05.jpg" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">


<p>Helmi stood in the gift wrapping hall, watching the conveyor belts churn out perfectly packed presents. Everything seemed fine—until it wasn’t. A loud <em>clunk</em> echoed through the workshop as a jam sent toys tumbling to the floor. “Again?” Helmi sighed, inspecting the tangled mess of gears and ribbons. The workshop clearly needed better monitoring. IoT sensors had been proposed, but Helmi shook their head. “Too energy-hungry,” they muttered, glancing at the power gauge already flickering in protest. Instead, Helmi dusted off a set of analog sensor prototypes—simple, elegant devices that processed data directly, no extra computing required. Temperature dials, pressure gauges, and motion levers clicked into place, their readings clear and immediate. With the sensors in sync, Helmi smiled as the machines hummed back to life, supervised and efficient. “Low-tech wins again,” they murmured, jotting a note for Santa: <em>More analog, less overkill.</em>

</section>

<section class="challenge">

<p>Of course, Helmi actually realizes that software-defined analog electronics can make a difference at 
the Internet of things, in particular when it comes to sensors and actors which all have analog interfaces.
Can you spot the advantages of analog in this application domain? Which of the following statements are true?

<form method="post" id='swapform'>
<?php
include 'formlib.php';

$quiz = new MultipleChoice("5");
$quiz->checkbox("Analog is energy saving", true);
$quiz->checkbox("Analog contains a lot of storage", false);
$quiz->checkbox("Digital is faster", false);
$quiz->checkbox("Analog remains big and clunky", false);
$quiz->checkbox("Artificial Intelligence requires digital computers ", false);
$quiz->checkbox("Analog provides less latency", true);
$quiz->checkbox("Analog is low-tech", false);
$quiz->checkbox("IoT and Industry 4.0 must be a lot of data, kind of by definition", "both");
$quiz->checkbox("Analog works best together with digital systems", "both");


$quiz->print();
$quiz->hand_in();

?>
</form>

</section>
