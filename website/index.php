<?php

$days_dir = "../days/"; # including trailing slash
$today = date("j"); // without leading zero, thus int

// Be able to start before December...
$month = date("m");
if($month < 12) $today = 1;

#$today = "4";

function read_day($day_file, $section) {
    file_get_contents($day_file);
}

include 'users.php';

$day = isset($_GET['day']) ? $_GET['day'] : 0;


class FlatFile {
    function __construct($filename) {
        $this->sep = ' ';
        $this->storage_file = $filename;
    }
    
    function get($token) {
        if(file_exists($this->storage_file))
            foreach(file($this->storage_file) as $ln => $line) {
                list($storage_token, $storage_data) = explode($this->sep, $line, 2);
                if($storage_token == $token) {
                    return $storage_data;
                    break;
                }
            }
    }
    
    function getJSON($token) {
        $json = $this->get($token);
        if($json) return json_decode($json);
    }
    
    function put($token, $payload_string) {
        if(str_contains($token, $this->sep) || str_contains($token, "\n") || !preg_match("/[a-zA-Z0-9]+/", $token))
            throw new Exception("Unacceptable token: $token");
        # just clean data instead of raising
        $payload_string = preg_replace("/\s+/", " ", $payload_string); # in particular, removes newlines
        #if(str_contains($payload_string, "\n"))
        #    throw new Exception("Illegal data to serialize in flat file format: $payload_string");
        $dataline = $token . $this->sep . $payload_string . "\n";
        
        # find existing line, performing an update
        if(file_exists($this->storage_file)) {
            $lines = file($this->storage_file);
            foreach($lines as $ln => $line) {
                list($storage_token, $storage_data) = explode($this->sep, $line, 2);
                if($storage_token ==  $token) {
                    $lines[$ln] = $dataline;
                    file_put_contents($this->storage_file, implode("\n", $lines));
                    return;
                }
            }
        }
    
        # otherwise, append
        file_put_contents($this->storage_file, $dataline, FILE_APPEND);
    }
    
    function putJSON($token, $array) {
        $this->put($token, json_encode($array));
    }
    
};



?>
<!doctype html>
<html>
<head>
    <title>Computational Christmas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="anachrist.css">
    <script src="htmx203.js"></script>
    <script src="anachrist.js"></script>
    <script src="style/snow.js" defer async></script>
    <script>
        <!-- Santa Ugly is in the house -->
        window.cookie_name = "<?php echo $cookie_name; ?>";
        window.cookie_split = "<?php echo $cookie_split; ?>";
    </script>
 
    <meta property="og:title" content="Computational Christmas by Anabrid">
    <meta property="og:description" content="24 little adventures and riddles allow you to enter the world of analog computing.">
    <meta property="og:image" content="https://analog.wtf/graphics/screenshot.png">
    <meta property="og:url" content="https://analog.wtf">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Computational Christmas by Anabrid">   
</head>
<body>

<header>
    <nav>
        <a href="?faq" class="faq" title="Frequently asked questions"><img src="style/faq.svg"></a>
        <a href="?user" class="user" title="Login and Manage user"><img src="style/user.svg"></a>
    </nav>
    <h1><a href="?">Computational Christmas</a></h1>
    <!-- today=<?=$today;?> -->
</header>


<?php
if(isset($_GET['user'])) {
    print_user_managament_section();
} else if(isset($_GET['faq'])) {
    include 'faq.php';
} else if(!$day) {
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
    print "<h2>Dec $day</h2>";
    
    $valid = is_numeric($day) && 1 <= $day && $day <= 24;
    if(!$valid) {
        echo "Invalid day: $day";
        exit;
    }
    if($day > $today)  {
        header("HTTP/1.1 401 Unauthorized");
        print "<p style='text-align:center'>Nice try! This door is not yet open.</p>";
        print "<p style='text-align:center'><a href='https://xkcd.com/838/'>This incident will be reported.</a></p>";
        print '<p>&nbsp;</p>';
    } else {
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
            //echo var_dump($day_candidates);
            exit;
        }
        
        $day_candidate = $day_candidates[0];
        
        $day_file = is_dir($day_candidate) ? 
            ($day_candidate . "/index.html") : $day_candidate;
        
        if(!is_file($day_file)) {
            echo "Could not find day file: $day_file";
            exit;
        }
        
        include $day_file;
    }
    
    echo '</section>'; // day
    
}

?>

<div id="wave">
    <img src="style/white.svg">
</div>
<footer>
    The Analog Advent is a service by
    <a href="https://anabrid.com">anabrid</a>.
    <br>
    <a href="https://anabrid.com/imprint/">Imprint/Legal/Contact</a>
</footer>

<canvas id="snow"></canvas>

<!-- only for htmx form swapping -->
<div id="spinner" style="display: none;">Loading...</div>
