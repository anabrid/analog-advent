<?php

// a library for the forms in the days in the calendar.
// This implements most of the calendar buisness logic.
// This was rewritten during December to not only allow to participate in the current day
// quiz but in every quiz until this day, because of low participation.

// This library depends on PHP variables and classes defined in the website
// directory. The idea is to have everything included only, no direct calls.

class MultipleChoice {
    var $field_name;
    var $valid_values = [];
    
    function __construct($day) {
        global $today, $token; // from global index
        $this->day = $day;
        $this->field_name = "multipleChoice".$day;
        $this->field_name_php = $this->field_name . '[]'; // a HTML form name where php deconstructs an array
        $this->token = $token;
     
        # path is relative to index.php...
        $this->storage_file = new FlatFile("../user_data/day" . sprintf("%02d", $day) . ".csv");

        if(isset($_POST[$this->field_name]))
            $this->storage_file->putJSON($this->token, $_POST[$this->field_name]);
        
        $this->user_data = $this->storage_file->getJSON($token);
    }
    
    function checkbox($option, $valid_value) {
        $this->valid_values[$option] = $valid_value; // valid value is a boolean
    }
    
    function print() {
        //var_dump($this);
        
        if($this->user_data) {
            print "<p class='info'>Thanks for participating in this day as <em>{$this->token}</em>. We checked your answers, please see below.</p>";
        } else if($this->token) {
            print "<p class='info'>You are logged in as <em>{$this->token}</em></p>";
        } else {
            print "<p class='info'>Vote is open. Please <a href='?user'>register first</a>.</p>";
        }
        
        foreach($this->valid_values as $key => $valid_value) {
            $id = md5($this->field_name . $key);
            if($this->user_data) {
                #var_dump($this);
                $checked = in_array($key, $this->user_data);
                $checked_html = $checked ? 'checked=checked' : '';
                if($valid_value === "both") {
                    $correct = true;
                    $correct_text = "Both options are right";
                } else { // either true or false is correct
                    $correct = $checked == $valid_value;
                    $correct_text = $correct ? "Correct!" : "Wrong";
                }

                $correct_class = $correct ? "correct" : "wrong";
                $correct_text = $correct_text ? "<span class='$correct_class'>$correct_text</span>" : "";
                print "<div><input type='checkbox' $checked_html disabled=disabled> $key $correct_text</div>";
            } else {
                $disabled_html = !$this->token || $this->user_data ? "disabled=disabled" : '';
                $checked_html = $this->user_data && $valid_value ? "checked=checked" : '';
                $key = htmlentities($key);
                print "<div><label for='$id'><input type='checkbox' name='{$this->field_name_php}' id='$id' $checked_html value='$key' $disabled_html> $key</label></div>";
            }
        }
    }
    
    function hand_in() {
        if(!$this->user_data) {
            $disabled = $this->token ? "" : "disabled";
            print '<p><button type="submit" '.$disabled.'>Hand in</button></p>';
        } else if($this->day != 24) {
            print '<p><a href="?day='.($this->day+1).'">Go to next day</a></p>';
        }
    }
    
};

// Kind of the same but for numbers...

class NumberQuiz {
    var $check_callback; // type signature: function($user_value) -> bool
    var $correct_solution; // exact solution
    
    function __construct($day) {
        global $today, $token; // from global index
        $this->field_name = "numericInput" . $day;
        $this->token = $token;
        
        # path is relative to index.php...
        $this->storage_file = new FlatFile("../user_data/day" . sprintf("%02d", $day) . ".csv");

        if(isset($_POST[$this->field_name]))
            $this->storage_file->put($this->token, $_POST[$this->field_name]);
        
        $this->user_data = $this->storage_file->get($token);
    }

    function print() {
        if($this->user_data) {
            $correct = call_user_func($this->check_callback, $this->user_data);
            $status = $correct ? "correct" : "wrong";
            print "<p class='info'>Thanks for participating in this day. Your answer: <strong>{$this->user_data} %</strong>. This is considered as <strong>$status</strong>. Exact solution: {$this->correct_solution} <strong></p>";
        } else if($this->token) {
            print "<p class='info'>You are logged in as <em>{$this->token}</em></p>";
            print "<p><label for='{$this->field_name}'>Enter a number: <input type='number' name='{$this->field_name}' id='{$this->field_name}' required> %</label></p>";
        } else {
            print "<p class='info'>Vote is open. Please <a href='?user'>register first</a>.</p>";
            print "<p><label for='{$this->field_name}'>Enter a number: <input type='number' name='{$this->field_name}' id='{$this->field_name}' disabled> %</label></p>";
        }
    }

    function hand_in() {
        if(!$this->user_data) {
            $disabled = $this->token ? "" : "disabled";
            print '<p><button type="submit" '.$disabled.'>Hand in</button></p>';
        } else if($this->day != 24) {
            print '<p><a href="?day='.($this->day+1).'">Go to next day</a></p>';
        }
    }
}
