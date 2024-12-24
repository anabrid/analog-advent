<?php

/* Read out all logic and evaluate the users to a CSV file */

chdir("website/"); // for functional logic in users.php
include 'users.php';

$sep = ";";
$fp = fopen("php://output", "w");

$fields = array("token", "contact", "participation_percentage", "eligable");
for($day = 1; $day <= 24; $day++) $fields[] = "day$day";

fputcsv($fp, $fields, $sep, '"', ''); // write header line

foreach(file($user_file) as $ln => $line) {
    list($token, $contact) = explode(" ", $line, 2);
    
    $user_results = user_day_results($token);
    extract(user_evaluate_results($token));
    
    $contact = trim($contact);
    $eligable = $eligable ? "Yes" : "No";
    $participation_percentage .= "%";
    
    $fields = compact("token", "contact", "participation_percentage", "eligable");
    foreach($user_results as $day => $participated) {
        $fields[] = $participated ? "1" : "";
    }
    
    fputcsv($fp, $fields, $sep, '"', '');
}


?>
