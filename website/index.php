<?php

$days_dir = "../days/"; # including trailing slash
$today = date("j"); // without leading zero, thus int

$today = "3";

function read_day($day_file, $section) {
    file_get_contents($day_file);
}

include 'users.php';


?>
<!doctype html>
<html>
<head>
    <title>Computational Christmas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="anachrist.css">
    <script src="https://unpkg.com/htmx.org@2.0.3"></script>
</head>
<body>

<header>
    <h1>Computational Christmas (php)</h1>
    <p>Today is <?=$today;?>. You are <?=$token?$token:"not logged in";?></p>
</header>



<?php
if(!isset($_GET['day'])) {
    echo '<ul>';
    for($day = 1; $day <= 24; $day++) {
        $opened = $day <= $today;
        echo "<li>";
        if($opened)
            echo "<a href='?day=$day'>$day</a>";
        else
            echo $day;
        
        if($day == $today)
            echo " (today!)";
    }
} else {
    echo '<section class="day">';
    echo "<a href='?'>Back to overview</a>";
    
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
