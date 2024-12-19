<h1>Neuromorphic computing</h1>

<section class="story">

<p>
Helmi sat at the edge of the workbench, studying a dusty old diagram Santa had once commissioned for an AI-driven toy sorter. The digital neural network behind it had required massive computational resources, thousands of training cycles, and endless debugging to classify even simple shapes. Helmi sighed, setting the diagram aside. “All that effort, and for what? A digital brute force approach,” she muttered. But then, inspiration struck—a richer, more elegant path was already emerging.

<p>
Helmi turned their attention to neuromorphic computing. Unlike traditional neural networks, these systems mimicked the dynamic behavior of real neurons, using oscillators to process information with astounding efficiency. Helmi sketched out a simple test: solving the classic MNIST dataset, recognizing handwritten digits. Where a digital deep-learning model might need hundreds of artificial neurons, the oscillator-based approach required just <em>four</em>. The oscillators, each tuned to resonate uniquely, captured the intricate patterns of the data with unparalleled elegance.

<p>
By the end of the day, Helmi had a working prototype. Watching the oscillators sync and desync as she processed the dataset, Helmi grinned. “Faster, simpler, and fundamentally more powerful,” she whispered. “It’s not just efficiency—it’s intelligence done right.” A note for Santa followed: <em>Next-gen toys? Neuromorphic is the way.</em>

</section>
<section class="challenge">

<p>Given the enormous success of LLMs and generative AI, Helmi couldn’t help but ponder how to implement AI on more efficient hardware. Isn’t it fascinating—and a little maddening—that modern AI is so often held back by hardware limitations? Let’s see what you know about neuromorphic computing!</p>

<form method="post" class="inplace">
<?php
include 'formlib.php';

$quiz = new MultipleChoice("19");

$quiz->checkbox("Neuromorphic computing mimics the structure and function of the human brain to process information.", true);
$quiz->checkbox("Spiking neural networks communicate using continuous signals rather than discrete spikes.", "both");
$quiz->checkbox("Oscillator-based neural networks can solve problems like MNIST digit recognition with significantly fewer nodes than traditional networks.", true);
$quiz->checkbox("Complex mathematical neuron models allow for richer dynamics compared to simple artificial neurons.", true);
$quiz->checkbox("Traditional deep learning networks always outperform unconventional neural networks in all scenarios.", false);

$quiz->print();
if($quiz->user_data) {
?>

<div class="info">Thanks for participating! You unlocked some <strong>Bonus Material</strong>: Given that we could not embed a neuromorphic simulation right in this quiz today, here are a few standalone recreational and simple to grasp simulations of how AI or neurons actually work:

<ul>
<li>Conventional hidden layer neural networks with the <a target="_blank" href="https://playground.tensorflow.org/">Tensorflow Playground</a>
<li>An actual <a target="_blank" href="https://nbnch.io/s/xnzs-qhdf">biologically realistic neural network</a> 
by <a target="_blank" href="neuronbench.com">NeuronBench</a>
<li><a target="_blank" href="http://netpyne.opensourcebrain.org/">NetPyNE</a> is another academical, biological neuron simulation by the <a target="_blank" href="http://www.opensourcebrain.org/">Open Source Brain</a> project. Click on the <em>Examples</em> menu to load a demo.
</ul>
</div>

<?php 

}
$quiz->hand_in();

?>
</form>



</section>
