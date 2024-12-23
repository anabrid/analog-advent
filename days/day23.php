<h1>Interconnects</h1>

<section class="story">
<p>
Helmi sat cross-legged on the workshop floor, watching as elves exchanged toys and tools with easy camaraderie. The network of sharing was seamless—everyone knew who to turn to for help, and resources flowed freely. Helmi smiled. “It’s like an analog computer,” they thought. Each connection strengthened the system, just as friendships did.

<p>
Their thoughts turned to the final challenge before Christmas Eve: interconnecting Santa’s entire operation. Quantum computing, for all its hype, was limited by finite entanglement volumes, making large-scale interconnection fundamentally constrained. But classical analog systems? There was no theoretical cap. Analog computers thrived on dense, continuous interconnections, mimicking the richness of social networks where every node could talk to every other.

<p>
Helmi jotted notes furiously, sketching an interconnected analog processing system. This network could coordinate Santa’s sleigh, toy deliveries, and workshop operations in real time, leveraging the dense interlinking to solve problems faster and with greater efficiency. 

<p>
Looking back at the bustling workshop, Helmi grinned. “Whether it’s friends sharing toys or processors sharing data, interconnection makes everything stronger,” they said, writing a final note for Santa: *Analog delivers infinite possibilities, just like friendship.*

</section>
<section class="challenge">

<img src="graphics/chimera.png" style="float:right; max-width:40%; min-width:300px">

<p>Last day, last quiz! Helmi stumbled upon interconnection schemes which are important for analog computers in the same way as they are for quantum computers. Let's inspect the DWave Chimera topology, which is shown on the right. What do you know about graph theory?


<form method="post" class="inplace">
<?php
include 'formlib.php';

$quiz = new MultipleChoice("23");

$quiz->checkbox("A Chimera graph is a type of sparse graph designed for quantum annealing applications.", true);
$quiz->checkbox("A Chimera graph is a complete graph with no limitations on node connectivity.", false);
$quiz->checkbox("The maximum number of connections a node can have in a standard Chimera graph is six.", true);
$quiz->checkbox("In a Chimera graph, every node is connected to every other node in the graph.", false);
$quiz->checkbox("The sparsity of a Chimera graph means it has fewer edges compared to a fully connected graph of the same size.", true);
$quiz->checkbox("The shown graph with 8 nodes has exactly 8 edges if it forms a perfect cycle.", false);
$quiz->checkbox("An 8-node Chimera graph can have up to 28 edges in a complete graph but usually has far fewer.", true);

$quiz->print();
if($quiz->user_data) {
?>

<p class="info">
Thank you for participating!
</p>

<?php 

}
$quiz->hand_in();

?>
</form>

</section>
