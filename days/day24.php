<h1>The Grande Finale</h1>

<section class="story">
<p>
The workshop buzzed with excitement as the final preparations came together. Helmi stood proudly next to Santa’s sleigh, its polished runners gleaming under the enchanted lanterns. Every flap, every circuit, every system—crafted with care and precision, powered by the brilliance of analog computing. The sleigh was now faster, more efficient, and ready to glide seamlessly through the night sky.

<p>
For the first time in years, Santa felt truly at ease. He chuckled warmly, pulling on his finely tailored, tech-enhanced suit, its analog processors running quietly in the background. “You’ve outdone yourself, Helmi,” Santa said, giving them a jolly pat on the shoulder. “This sleigh isn’t just ready—it’s perfect.”

<p>
As the elves gathered around, Santa turned to the readers. “Each and every one of you has been good this year,” he proclaimed, his voice resonating through the workshop. “But as tradition holds, there can only be one winner of the grand prize!” He paused dramatically, winking at Helmi. “And the lucky winner will be revealed during Christmas!”

<p>
The elves cheered, the reindeer stomped in excitement, and Helmi couldn’t help but smile. Their work was done, their dreams of efficiency and ingenuity realized. As the sleigh soared off into the starry night, its analog systems humming with festive harmony, Helmi waved and whispered to themselves, “Merry Christmas to all—and to all a well-crafted night!”
</section>

<section class="challenge">

<p><?php if($token) {
    extract(user_evaluate_results($token));
?>
    Thank you for your participation in the quizzes in this advent calendar. There is no quiz today. Instead, it is time
    to <a href="?results">review your participation at the results overview</a>. <?php echo $sentence; ?>
<?php } else { ?>
    It might still be not too late to participate in the quiz. Head over to <a href="?user">user registration</a> and
    complete a good part of the advent calendar quizzes in order to take part in the prize winning.
<?php } /* endif */ ?>
</section>
