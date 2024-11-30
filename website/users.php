<?php

// user managament functions

$cookie_name = "anachrist_id";
$cookie_split = '-';
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
    }
    $signature_proof = hash_hmac('sha256', $token, $server_handout_secret);
    
    $correct_signature = $signature == $signature_proof;
    header('X-Anachrist-Token', $correct_signature ? 'accepted' : 'declined');
    if(!$correct_signature)
        $token = null; # basically logout on server side
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
