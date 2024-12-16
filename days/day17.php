<h1>70% of IPhone is Analog</h1>

<section class="story">

<img src="graphics/canva17.jpg" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">

<p>
Helmi stood by the inspection table, surrounded by the latest batch of gifts. Among them, stacks of shiny new smartphones gleamed under the workshop lights. Helmi picked one up, turning it over in their hands. “It looks like last year’s model,” they murmured, powering it on. Sure enough, the features were nearly identical. Despite sleek marketing promises, the underlying technology had stalled. Chips weren’t getting faster or smaller, and the digital processors inside had hit their limits. Even more surprising to Helmi was the realization that over 70% of the chips in these phones were analog. 

<p>
“What if we stopped treating analog as just an add-on?” Helmi mused, their mind racing. Combining analog and digital processing on a single programmable analog chip could revolutionize performance. Analog circuits could handle the continuous, real-world data directly—signals, sound, and images—while digital elements tackled logic and control tasks. The result? Smaller, faster, and more energy-efficient processors.

<p>
Helmi sketched the concept into their notebook: a programmable analog-digital hybrid chip, optimized for real-world computing. They smiled, imagining what next year’s gifts could look like. “Smartphones that are actually smart,” they said, jotting down a note for Santa: *Next generation tech starts here. Prepare for analog-powered wonders.*

</section>
<section class="challenge">

<p>Helmi uncovered the critical role of analog electronics in one of the most ubiquitous modern handheld devices: the smartphone. How much do you really know about your phone's inner workings?</p>

<form method="post" class="inplace">
<?php
include 'formlib.php';

$quiz = new MultipleChoice("17");

$quiz->checkbox("Over 70% of an iPhone’s chips are analog.", true);
$quiz->checkbox("Modern smartphones rely exclusively on digital components for sensors and input/output systems.", false);
$quiz->checkbox("Analog sensors in smartphones include accelerometers, gyroscopes, and ambient light sensors.", true);
$quiz->checkbox("Replacing analog chips with digital ones would make smartphones more energy-efficient.", false);
$quiz->checkbox("Reconfigurable analog chips in smartphones can significantly reduce the space needed compared to digital signal processors (DSPs).", true);
$quiz->checkbox("Analog chips handle tasks like audio processing and power management in smartphones.", true);

$quiz->print();
if($quiz->user_data) {
?>

<p class="info">Thank you for participating. Let's face the future with cool analog digital hybrid powered smartphones!</p>
</p>

<?php 

}
$quiz->hand_in();

?>
</form>


</section>
