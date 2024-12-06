<h1>Block chain</h1>

<section class="story">

<img src="graphics/canva07.jpg" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">


<p>Helmi stood outside the workshop, gazing at the North Pole’s iconic fairy lights twinkling against the icy night. These weren’t ordinary lights—they formed a vast "block chain," each glowing bulb representing a verified checkpoint in Santa’s gift ledger. But as beautiful as they were, their power draw was astronomical. “This blockchain tech is eating up enough energy to melt the ice caps!” Helmi muttered, frowning at the humming generators nearby.

<p>Could an analog system offer a sustainable version of proof-of-work or proof-of-space? Something that verified transactions with the elegance of a pendulum clock or the efficiency of a wave signal? Helmi paused, notebook in hand, and looked at the reader.

</section>
<section class="challenge">

<p>Helmi asks you: “What do you think? How can we replace this energy-hungry system with something analog, simple, and green? Santa’s lights—and the world—are counting on your ideas.”

<form method="post" id='swapform'>
<?php

$day = "7";
#global $today, $token; // from global index
$field_name = "textarea" . $day;
$token = $token;
        
# path is relative to index.php...
$storage_file = new FlatFile("../user_data/day" . sprintf("%02d", $day) . ".csv");

if(isset($_POST[$field_name]))
    $storage_file->put($token, $_POST[$field_name]);
        
$user_data = $storage_file->get($token);

if($user_data) {
    $user_data = htmlentities($user_data);
    print "<p class='info'>Thanks for participating in this day. Your input: <strong>{$user_data}</strong>.</p>";
} else if($token) {
    print "<p class='info'>You are logged in as <em>{$token}</em></p>";
} else {
    print "<p class='info'>You are open to contribute. Please <a href='?user'>register first</a>.</p>";
}

if(!$user_data) {
    $disabled = $token ? "" : "disabled";
    echo "<p><textarea placeholder='Your ideas come here' $disabled style='width:100%; min-height: 7em'></textarea>";
    print '<p><button type="submit" '.$disabled.'>Hand in</button></p>';
} else {
    ?>
    <p class="info">There is no right or wrong answer to this question. Thank you for your ideas,
      which helmi will read carefully.</p>
    <?php
    
    if($day != 24)
        print '<p><a href="?day='.($day+1).'">Go to next day</a></p>';
}

?>

</section>

