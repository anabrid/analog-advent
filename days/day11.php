<h1>Chip supplies and geopolitics</h1>

<section class="story">

<img src="graphics/canva11.jpg" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">

<p>>Helmi rubbed their temples as they examined the empty shelves in the electronics stockroom. Critical components for Santa’s high-tech sleigh and workshop had been delayed—again. The issue wasn’t just supply chain hiccups; it was a deeper problem. Modern CMOS chips, with their impossibly small nodal sizes, were all sourced from far-off factories in the Far East. With global tensions and logistical chaos, this dependence felt like a ticking time bomb.

<p>Helmi leaned against the workbench, pondering the way forward. “We need independence,” they murmured, sketching circuits in their notebook. The answer wasn’t in chasing Moore’s Law but stepping away from it. Bigger nodal sizes could be produced locally, right at the North Pole’s fab. While they might seem less advanced, Helmi knew the secret: clever design. Analog circuits could extract incredible performance from simpler structures, bypassing the need for extreme miniaturization.

<p>By evening, Helmi had a working prototype of a robust, efficient processor using locally sourced components. They held it up, its simplicity gleaming in the workshop lights. “No more waiting on distant ships,” they declared. “Analog gives us the power to control our own destiny—and deliver Christmas on time.”

</section>

<section class="challenge">

<p>Helmi uncovered the critical geopolitical dependencies shaping the future of computing. Global CMOS production is heavily concentrated in just a few regions. Can you estimate their share of the world’s total manufacturing capacity in percentages? Let’s see how close you can get!

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script><!-- has to be outside so it always loads -->

<form method="post" class='inplace'>
<?php
include 'formlib.php';

$quiz = new RankQuiz("11");

$quiz->slider("Europe (in particular Germany)", 10);
$quiz->slider("South Korea", 12);
$quiz->slider("Taiwan", 68);
$quiz->slider("China", 8);
$quiz->slider("Japan", 4);
$quiz->slider("USA", 12);

$quiz->print();

if($quiz->user_data) {
?>

<p>Explore your guess interactively, compared to (approximate) numbers we could find officially.
Ideally, all data points would be on the diagonale.</p>

<div style="max-width: 500px; width: 100%; margin: 0 auto;">
    <canvas id="scatterPlot" width="400" height="400" style="background-color:white"></canvas>
</div>

<script>
//ready(function(){
    
const ctx = document.getElementById('scatterPlot').getContext('2d');

const data = {
    datasets: [{
        label: 'Semiconductor Capacity vs Perception',
        data: 
        <?php
            $jsdata = [];
            foreach ($quiz->true_values as $key => $value) {
                $jsdata[] = [
                    "x" => $value,
                    "y" => isset($quiz->user_data[$key]) ? $quiz->user_data[$key] : 0,
                    "label" => $key
                ];
            }

            print json_encode($jsdata);
        ?>
        , // sic, js comma
        backgroundColor: 'rgba(75, 192, 192, 0.6)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
    }]
};

const options = {
    scales: {
        x: {
            title: {
                display: true,
                text: 'Where it really is (% of global production)',
            },
            beginAtZero: true,
        },
        y: {
            title: {
                display: true,
                text: 'What you thought it is (% of global production)',
            },
            beginAtZero: true,
        }
    },
    plugins: {
        tooltip: {
            enabled: true,
            callbacks: {
                label: function(context) {
                    const point = context.raw;
                    return `${point.label}:  Your guess ${point.y}%. Reality: ${point.x}%`;
                }
            },
            displayColors: false
        },
        legend: {
            onHover: function(e) {
                e.native.target.style.cursor = 'pointer';
            }
        }
    },
};

new Chart(ctx, {
    type: 'scatter',
    data: data,
    options: options
});

//});
</script>
<?php
} // user_data

$quiz->hand_in();
?>
</form>

</section>
