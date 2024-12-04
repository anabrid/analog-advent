<h1>Traveling salesman</h1>

<section class="story">

<img src="graphics/dalle3.webp" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">


<p>Helmi leaned over a sprawling map of the world, dotted with blinking lights marking every delivery point. Santa’s Christmas route was the ultimate optimization problem: a traveling sleigh salesman’s dream—or nightmare. Last year, the digital system running Dijkstra’s algorithm had nearly overheated, struggling to compute the shortest path in time. “Too slow,” Helmi muttered, shaking his head. This year, he had a new plan. Using partial differential equations to model the sleigh’s flow across the globe, he set up the peppermint annealer, an analog device that minimized travel time by finding the optimal energy state. Helmi watched as the device’s brass levers clicked and shifted, aligning pathways like rivers finding the easiest course. Within moments, the route emerged—swift, precise, and ready for the sleigh. Helmi grinned. “Take that, digital bottlenecks.” The reindeer stamped their approval, eager to test the new plan.

</section>

<section class="challenge">

<p>In order to understand how the analog approach is superior, first let's do the math of existing route planning: In 2014, Santa had to visit 1.8 billion households where in 2024, it is now 2.1 billion households
(one billion = 10<sup>9</sup>). The machines so far are running an algorithm approximatively solving
TSP within a &#x1D4AA;(<em>n</em><sup>2</sup>) runtime, with &#x1D4AA; being the <a href="https://en.wikipedia.org/wiki/Big_O_notation">Landau notation</a> and <em>n</em> the number of households.
In 2024, how much longer does it take Santa to visit all households, relative to 2014?

<form method="post" class="inplace">
<?php
include 'formlib.php';

$quiz = new NumberQuiz("3");
$quiz->check_callback = function($user_value) {
    return is_numeric($user_value) && (30 < $user_value && $user_value < 40)
        || (130 < $user_value && $user_value < 140);
};
$quiz->correct_solution = "A value between 30-40% would be accepted as correct";

$quiz->print();

#echo '<pre>'; var_dump($quiz); echo '</pre>';

if($quiz->user_data) {
?>

<p>The runtime difference is 2.1<sup>2</sup> / 1.8<sup>2</sup> = 1.36. That means
in 2024 the algorithm runs 36% longer then in 2014. However, the number of households
only increased by 16% in the same time. Quadratic runtime is actually "quite good" in
complexity theory.</p>

<p>When it comes to analog approaches, the runtime remains theoretically constant, given
that you have an analog computer big enough to represent 10<sup>9</sup> many vertices and all
the connections inbetween. It's challenging to build such a big machine but far from
impossible, given that contemporary digital computers easily can hold such a problem in
memory.</p>

<?php
} // solution

$quiz->hand_in();
?>
</form>


</section>
