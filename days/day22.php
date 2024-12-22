<h1>Quantum Computing</h1>

<section class="story">
<p>
Helmi peered through a magnifying lens, meticulously inspecting the finer details of each gift before preparing them for Santa’s sack. The intricate patterns on the toys sparked a familiar thought. “It’s like quantum particles,” Helmi mused, recalling the peculiar world of quantum computing, where the tiniest changes could ripple into complex, unpredictable behaviors. 

<p>
Quantum computing was all the rage, with billions of dollars flowing into research and promises of revolutionary breakthroughs. But as Helmi adjusted the lens, they couldn’t help but think: <em>It’s still so far from practical.</em> The complexity of qubit stability, error correction, and cryogenic cooling made it feel more like a distant dream than a tool ready for Christmas-level reliability.

<p>
Helmi glanced at their workbench, where a stack of analog computing modules awaited final adjustments. “Why chase the uncertain when we already have tools that work?” they murmured. Analog computing, grounded in simplicity and efficiency, offered a far more mature and accessible path to solving real-world problems. Unlike the quantum gamble, analog didn’t require exotic conditions—it thrived in the messy, continuous world where Santa’s sleigh operated.

<p>
With a smile, Helmi returned to the gifts. “Quantum might dazzle,” they thought, “but analog delivers.” And for Christmas, delivering was what mattered most.
</section>
<section class="challenge">

<p>Helmi discovered Quantum Computing, the mysterious computing technology of the future.
Can you solve the following myths of quantum computing?</p>

<form method="post" class="inplace">
<?php
include 'formlib.php';

$quiz = new MultipleChoice("22");

$quiz->checkbox("It is not possible to understand quantum computers.", false);
$quiz->checkbox("Quantum computers are the ultimate computers, solving all problems of mandkind.", false);
$quiz->checkbox("They are parallel while classical are not", false);
$quiz->checkbox("They can solve the full problem at the same time, classical can not.", false);
$quiz->checkbox("They explore entanglement, classical can not.", true);
$quiz->checkbox("Quantum cannot be simulated efficiently classically", false);
$quiz->checkbox("There are already real world uses for quantum computing", true);
$quiz->checkbox("Analog computers are quantum computers", "both");
$quiz->checkbox("Quantum computers are general purpose computers", false);

$quiz->print();
if($quiz->user_data) {
?>

<p class="info">
If it works, quantum computing will make a real difference for a certain class of computational
problems. And yet we need classical analog computers, filling a real third class of computing:
Digital, Analog and Quantum.
</p>

<?php 

}
$quiz->hand_in();

?>
</form>


</section>
