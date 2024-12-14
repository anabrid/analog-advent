<h1>PUFs</h1>

<section class="story">
<p>
Helmi sat at their workbench, staring at a stack of identical gift tags waiting to be attached to Santa’s presents. Each tag needed to serve as a certificate of authenticity—a magical guarantee that the gift was truly from Santa himself. But in a world of clever copycats, these tags had to be unclonable, unique for every present. Digital solutions had been proposed, but Helmi scoffed at the complexity and energy waste of cryptographic signatures. “We need something simpler, something analog,” they mused.

<p>
The answer was in <em>physically unclonable functions</em> (PUFs), which used the inherent randomness of physical materials to create unique identifiers. Helmi grabbed a handful of snowflake-patterned tags, each embedded with tiny, irregular imperfections in its design. By passing light or a tiny electric current through these imperfections, each tag produced a unique analog signature—impossible to replicate, even with the best technology.

<p>
Helmi tested the system, attaching a tag to a toy train and running it through Santa’s scanner. The sleigh dashboard lit up: <em>Verified—Santa’s Workshop, North Pole.</em> Helmi grinned, satisfied. “Unclonable, energy-efficient, and magical. These tags are more than certificates—they’re part of the magic of Christmas itself.”
</section>

<section class="challenge">

<p>Helmi uncovered a unique type of computing device—something often hidden within everyday applications, yet fundamentally tied to the physical essence of computing. It’s a perfect showcase for analog technology. How much do you know about Physically Unclonable Functions? Let’s find out!

<form method="post" class="inplace">
<?php
include 'formlib.php';

$quiz = new MultipleChoice("14");
$quiz->checkbox("Should a PUF generate unique and unpredictable outputs for each device?", true);
$quiz->checkbox("Is it essential for a PUF to be resistant to physical tampering and reverse engineering?", true);
$quiz->checkbox("Can PUFs be used to generate secure cryptographic keys without storing them on the device?", true);
$quiz->checkbox("Are PUFs commonly employed in securing IoT devices against counterfeit and unauthorized access?", true);
$quiz->checkbox("Can PUFs help authenticate hardware components in supply chains?", true);
$quiz->checkbox("Is it true that PUFs are sometimes less reliable in extreme temperature or voltage conditions?", true);
$quiz->checkbox("Should alternative security methods like TPMs (Trusted Platform Modules) be considered when PUFs are unreliable?", true);
$quiz->checkbox("Can optical properties of materials be used as a basis for certain types of PUFs?", true);
$quiz->checkbox("Are hash functions a viable alternative to PUFs for software-based authentication?", true);
$quiz->checkbox("Could PUFs replace passwords in low-power wearable devices by leveraging their inherent uniqueness?", true);


$quiz->print();

if($quiz->user_data) {
?>

<p class="info">Funnily, all provided statements to this quiz are true. This highlights the incredible versatility and importance of Physically Unclonable Functions in securing devices, authenticating components, and showcasing the untapped potential of analog computing in modern technology.</p>
</p>

<?php 

}
$quiz->hand_in();

?>
</form>


</section>
