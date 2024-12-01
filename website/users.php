<?php

// user managament functions

$cookie_name = "anachrist_id";
$cookie_split = '-';
$user_file = "../user_data/users.csv";
$server_handout_secret = 'viK9phei9ahweiKoo1diA';

if(isset($_GET['new_token'])) {
    $token = randomPassword();
    $signature = hash_hmac('sha256', $token, $server_handout_secret);
    $cookie_value = $token . $cookie_split . $signature;
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(compact('token', 'signature', 'cookie_name', 'cookie_value'));
    exit;
}


$token = null;
$signature = null;

if(isset($_COOKIE[$cookie_name])) {
    $cookie_vals = explode($cookie_split, $_COOKIE[$cookie_name]);
    if(count($cookie_vals) == 2) {
        $token = $cookie_vals[0];
        $signature = $cookie_vals[1];
    } else {
        $token = null;
        $signature = null;
    }
    $signature_proof = hash_hmac('sha256', $token, $server_handout_secret);
    
    // since the server_handout_secret was accidentally shared on github,
    // make another test to ensure that the chosen name at least doesnt break
    // the shitty flat file format
    if(!preg_match("/^[a-zA-Z0-9]*$/", $token)) {
        //echo "Will not accept the given token";
        //exit;
        $token = null;
    }
    
    $correct_signature = $token && $signature == $signature_proof;
    header('X-Anachrist-Token: ' . ($correct_signature ? 'accepted' : 'declined'));
    if(!$correct_signature)
        $token = null; # basically logout on server side
}

function readUserInfo($token) {
    global $user_file;
    if(file_exists($user_file)) {
        foreach(file($user_file) as $ln => $line) {
            list($storage_token, $storage_data) = explode(" ", $line, 2);
            if($storage_token == $token) {
                return $storage_data;
            }
        }
    }
    return null;
}

function writeUserInfo($token, $data) {
    global $user_file;
    $clean_data = preg_replace("/\s+/", " ", $data); # in particular, removes newlines
    $new_dataline = $token . ' ' . $clean_data . "\n";
    
    // find existing line
    if(file_exists($user_file)) {
        $lines = file($user_file);
        foreach($lines as $ln => $line) {
            list($storage_token, $storage_data) = explode(" ", $line, 2);
            if($storage_token == $token) {
                $lines[$ln] = $new_dataline;
                file_put_contents($user_file, implode("\n", $lines));
                return;
            }
        }
    }
    
    // otherwise, just append
    file_put_contents($user_file, $new_dataline, FILE_APPEND);
}

/*
class User {
    function __construct($token=null, $signature=null) {
        if($token && $signature) {
            $this->token = $token;
            $this->signature = signature;
        }
        
        if(!$token) {
            if(!isset($_COOKIE[$cookie_name])) {
            }
        }
    }

    function login() {
        $month = 60*60*24*30; // month in seconds
        setcookie($cookie_name, $this->token . $cookie_split . $this->signature, time() + 2*$month, '/');
    }

    function logout() {
        setcookie($cookie_name, '', time() - 3600, '/');
    }

    function compute_signature() {
        return 
    }

    function is_signature_correct() {
        return $compute_signature() == $this->signature;
    }
}
*/


function randomPassword( $len = 10, $ucfirst = true, $spchar = false ){
	/* Programmed by Christian Haensel
	 * christian@chftp.com
	 * http://www.chftp.com
     * Actually from https://www.warpconduit.net/password-generator/
	 *
	 * Exclusively published on weberdev.com.
	 * If you like my scripts, please let me know or link to me.
	 * You may copy, redistribute, change and alter my scripts as
	 * long as this information remains intact.
	 *
	 * Modified by Josh Hartman on 2010-12-30.
	 * Last modified: 2023-03-01
	 * Thanks to JKDos for suggesting improvements.
	 */
	if ( $len >= 8 && ( $len % 2 ) !== 0 ) { // Length parameter must be greater than or equal to 8, and a multiple of 2
		$len = 8;
	}
	$length = $len - 2; // Makes room for a two-digit number on the end
	$conso = array( 'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z' );
	$vowel = array( 'a', 'e', 'i', 'o', 'u' );
	$spchars = array( '!', '@', '#', '$', '%', '^', '&', '*', '-', '+', '?', '=', '~' );
	$password = '';
	$max = $length / 2;
	for ( $i = 1; $i <= $max; $i ++ ) {
		$password .= $conso[ random_int( 0, 19 ) ];
		$password .= $vowel[ random_int( 0, 4 ) ];
	}
	if ( $spchar == true ) {
		$password = substr( $password, 0, - 1 ) . $spchars[ random_int( 0, 12 ) ];
	}
	$password .= random_int( 10, 99 );
	if ( $ucfirst == true ) {
		$password = ucfirst( $password );
	}
	return $password;
}

function print_user_managament_section() {
    global $token;
    $userinfo = readUserInfo($token);
?>

<section class="day">
    <h2>Account managament</h2>
    
    <form method="post" onsubmit="save_cookie();">
    
    <?php
    
    if(isset($_POST['submitted'])) {
        if(!$token) { // extracted by cookie, really ugly.
            echo "Illegal token. Only tokens signed by server are accepted.";
            exit;
        } else {
            echo "<p class='info'>Token successfully stored as Cookie.</p>";
        }

        if(isset($_POST['address'])) {
            writeUserInfo($token, $_POST['address']);
            echo "<p class='info'>Postal information successfully stored as Cookie.</p>";
        }
        
        echo "<p><a href='?'>Proceed to overview page</a> or <a href='?user'>Change user settings</a></p>";
       
    } else {
    ?>
    
    <p>This website works with a <em>token</em> which combines a username and password. Don't share
    this token with anybody. Copy your token in order to move your results to another computer. If
    you assign another token, all your results will be lost. This is equivalent to a logout.
    You can choose the token freely but
    we suggest you use the rather strong ones proposed by the system. This is your current token:

    <p style="text-align:center">
        <input type="hidden" name="submitted" value="true">
        <input type="text" id="token-field" name="token" value="loading...">
        <button id="refresh-token" onclick="if(confirm('Are you sure you want to wipe your token and assign a new one? This deletes all your replies and cannot be undone. Maybe save your old token first.')) new_token(); return false;">Assign another token</button>

    </p>
    
    <noscript>
        <p class="info"><b>Attention</b>: The Advent calendar uses JavaScript for user managament. Sorry, without javascript
            you cannot participate in the price draw!</p>
    </noscript>

    <p>If you want to take part in the prize draw, we need your contact details. Otherwise, please leave the following field empty
    or clear it, respectively.

    <textarea class="block" id="address" name="address" placeholder="Provide your name and a way how we can contact you. This can be an email address, a social media handle, a phone number or postal address, depending on your preference."><?php
        if($userinfo) print htmlentities($userinfo);
    ?></textarea>

    <p style="font-size:75%; line-height: 130%;">
    By participating, you agree to <a href="https://en.wikipedia.org/wiki/General_Data_Protection_Regulation">GDPR</a>/<a href="https://de.wikipedia.org/wiki/Datenschutz-Grundverordnung">DSGVO</a>. A cookie will be stored on your computer allowing you to track your replies, surviging 60 days. Replies and the token are stored on our server. This allows us to do statistics on the participant results and to rank participation. Legal recourse is excluded with regard to the competition. Anabrid employees and relatives can do the quizzes but are excluded from the competition. Sorry guys.
    </p>

    <div style="text-align:center">
        <button style="font-size: 150%" type="submit">Register</button>
    </div>
    
    <?php
    
    } // else no form
    
    ?>
    
    <p>&nbsp;</p>

    </form>
    
</section>

<?php } // print_user_managament_section
