<?php

$days_dir = "../days/"; # including trailing slash
$today = date("j"); // without leading zero, thus int

$today = "22";

function read_day($day_file, $section) {
    file_get_contents($day_file);
}

include 'users.php';

$shows_day = isset($_GET['day']);

?>
<!doctype html>
<html>
<head>
    <title>Computational Christmas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="anachrist.css">
    <script src="https://unpkg.com/htmx.org@2.0.3"></script>
    <script src="style/snow.js"></script>
</head>
<body>

<header>
    <h1><a href="?">Computational Christmas</a></h1>
    <!-- today=<?=$today;?> -->
</header>


<?php
if(!$shows_day) {
    echo '<section class="days"><ul>';
    for($day = 1; $day <= 24; $day++) {
        $opened = $day <= $today;
        $today_class = $day == $today ? 'today' : '';
        echo "<li>";
        if($opened)
            echo "<a href='?day=$day' class='open $today_class'>$day</a>";
        else
            echo "<a class='not-open'>$day</a>";
    }
    echo '</ul></section>';
} else {
    echo '<section class="day">';
    
    $day = $_GET['day'];
    $valid = is_numeric($day) && 1 <= $day && $day <= 24;
    if(!$valid) {
        echo "Invalid day: $day";
        exit;
    }
    if($day > $today)  {
        header("HTTP/1.1 401 Unauthorized");
        print "Nice try! This door is not yet open.";
        exit;
    }
    
    $wildcard = '*'; # globbing any extension or directory
    $day_dir = $days_dir . 'day' . sprintf("%02d", $day) . $wildcard;
    $day_candidates = glob($day_dir);
    #echo $day_dir . "\n<br>";
    #echo var_dump($day_candidates);
    
    if(count($day_candidates) == 0) {
        echo "Unfortunately, day $day is not yet prepared";
        exit;
    } elseif(count($day_candidates) > 1) {
        echo "Too much day candidates: ";
        echo var_dump($day_candidates);
        exit;
    }
    
    $day_candidate = $day_candidates[0];
    
    $day_file = is_dir($day_candidate) ? 
        ($day_candidate . "/index.html") : $day_candidate;
    
    if(!is_file($day_file)) {
        echo "Could not find day file: $day_file";
        exit;
    }
    
    #$day_file_content = file_get_contents($day_file);
    include $day_file;
    
    #echo $day_file_content;
    echo '</section>'; // day
    
}

?>

<div id="wave">
    <img src="style/white.svg">
</div>
<canvas id="snow"></canvas>
