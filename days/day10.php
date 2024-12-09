<h1>Wearables</h1>

<section class="story">

<p>Helmi stepped back to admire their latest creation—a sleek new line of outfits for the workshop team and Santa himself. The designs were bold and festive, blending deep reds, shimmering greens, and accents of gold thread that seemed to glow softly in the dim workshop light. But the real innovation was the embedded wearable technology: health monitors, communication links, and even navigation aids for Santa’s suit. The problem? All these gadgets were energy vampires, draining their tiny power cells faster than a reindeer could blink.

<p>Helmi frowned. “We can’t have style without sustainability,” they declared, turning to their workbench. Drawing from their growing expertise, Helmi began designing energy-harvesting analog processors. These tiny devices, powered by motion, body heat, or even ambient light, processed data directly without the energy-hungry layers of digital computation. By the end of the day, the prototypes were sewn into the fabric, their circuits seamlessly integrated with the festive designs. 

<p>Helmi slipped a reimagined jacket onto a mannequin and smiled. “Style, tech, and efficiency—now <em>that’s</em> holiday-ready.” Santa, watching from his armchair, chuckled approvingly. "You’ve outdone yourself again, Helmi."

</section>

<section class="challenge">

<p>Helmi revealed how energy-efficient analog electronics could revolutionize the fast-growing world of wearable technologies.
Today, let’s explore together—this isn’t a quiz but a survey. Are you as excited about the future of wearables as we are? Share your thoughts!


<form method="post" class='inplace'>
<?php
include 'formlib.php';

?><h4>1. What wearables do you already use today?</h4><?php
$quiz = new MultipleChoice("10a");
$quiz->display_correct_text = false;
$quiz->checkbox("(a) Smartwatch");
$quiz->checkbox("(b) Fitness tracker");
$quiz->checkbox("(c) Smart glasses");
$quiz->checkbox("(d) Wireless earbuds with health tracking");
$quiz->checkbox("(e) Medical wearables (e.g., glucose monitor)");
$quiz->checkbox("(f) Wearable cameras or body cams");
$quiz->checkbox("(g) None yet, but I’m intrigued!");
$quiz->checkbox("(h) Something else.");
$quiz->print();
//$quiz->hand_in();
?>
<h4>2. Where do you think wearable technology has the most impact today?</h4>

<?php
$quiz2 = new MultipleChoice("10b");
$quiz2->display_correct_text = false;
$quiz2->checkbox("(a) Health monitoring (heart rate, blood pressure, etc.)");
$quiz2->checkbox("(b) Fitness tracking and goal setting");
$quiz2->checkbox("(c) Smart assistance for productivity (e.g., voice recognition, reminders)");
$quiz2->checkbox("(d) Entertainment (e.g., augmented reality, immersive gaming)");
$quiz2->checkbox("(e) Communication (e.g., discreet messaging)");
$quiz2->checkbox("(f) Fashion and self-expression (e.g., mood-reactive clothing)");
$quiz2->checkbox("(g) Safety and security (e.g., fall detection, emergency alerts)");
$quiz2->checkbox("(h) Specialized use cases (e.g., sports performance, work safety)");
$quiz2->print();

?>

<h4>3. Where could wearables make a big difference in the future? (Dream big!)</h4>
<?php
$quiz3 = new MultipleChoice("10c");
$quiz3->display_correct_text = false;
$quiz3->checkbox("(a) Continuous health diagnostics to detect diseases early");
$quiz3->checkbox("(b) Wearable AI that learns and adapts to your habits");
$quiz3->checkbox("(c) Smart fabrics that change color or texture based on mood or weather");
$quiz3->checkbox("(d) Augmented reality glasses for seamless work and play");
$quiz3->checkbox("(e) Exoskeletons for enhanced physical capabilities");
$quiz3->checkbox("(f) Mind-controlled devices for accessibility and creativity");
$quiz3->checkbox("(g) Wearable solar panels for energy independence");
$quiz3->checkbox("(h) Real-time emotion tracking and communication aids");
$quiz3->checkbox("(i) Wearables for deep-space exploration and survival");
$quiz3->checkbox("(j) Sensor networks for real-time environmental protection (e.g., fire detection)");
$quiz3->checkbox("(k) Skin-embedded wearables for a truly seamless experience");
$quiz3->checkbox("(l) Something else entirely.");

$quiz3->print();
$quiz3->hand_in();
?>
</form>


</section>
