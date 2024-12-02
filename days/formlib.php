<?php

// a library for the days in the calendar

class MultipleChoice {
    var $field_name;
    var $valid_values = [];
    
    function __construct($day) {
        global $today, $token; // from global index
        $this->show_solution = $day < $today;
        $this->field_name = "multipleChoice".$day;
        $this->field_name_php = $this->field_name . '[]'; // a HTML form name where php deconstructs an array
        $this->submitted_data = isset($_POST[$this->field_name]) ? $_POST[$this->field_name] : null;
        
        # path is relative to index.php...
        $this->storage_file = "../user_data/day" . sprintf("%02d", $day) . ".csv";
        
        $this->token = $token;
        
        $this->saved_user_data = null;
        if(file_exists($this->storage_file))
            foreach(file($this->storage_file) as $ln => $line) {
                list($storage_token, $storage_data) = explode(" ", $line, 2);
                if($storage_token == $this->token) {
                    $this->saved_user_data = json_decode($storage_data);
                    break;
                }
            }        
    }
    
    function checkbox($option, $valid_value) {
        $this->valid_values[$option] = $valid_value; // valid value is a boolean
    }
    
    function print() {
        //var_dump($this);
        
        if(!$this->show_solution) { // poll still open
            if($this->token) {
                print "<p class='info'>You are logged in as <em>{$this->token}</em></p>";
                
                if($this->saved_user_data) {
                    print "<p class='info'>Thanks for participating in this day. Your answers are displayed below, results are revealed tomorrow.</p>";
                } else if($this->submitted_data) { // currently submitting
                    $dataline = $this->token . ' ' . json_encode($this->submitted_data) . "\n";
                    file_put_contents($this->storage_file, $dataline, FILE_APPEND);
                    print "<p class='info'>Your reply has been saved!</p>";
                    $this->saved_user_data = $this->submitted_data;

                    print "<p class='info'>Thanks for participating in this day. Your answers are displayed below, results are revealed tomorrow.</p>";
                }
            } else {
                print "<p class='info'>Hint: The vote is open but you have not registered, so you cannot participate. Please <a href='?user'>register first</a>, then vote again.";
            }
        } else { // poll closed
            if(!$user_data) {
                print "<p class='info'>This day quiz is already closed. You are logged in as <em>{$this->token}</em> and did not participate. In the following, the corrrect solution is shown.</p>";
            } else {
                print "<p class='info'>This day quiz is closed and you participated as <em>{$this->token}</em>.";
            }
        }
        
        foreach($this->valid_values as $key => $valid_value) {
            $id = md5($this->field_name . $key);
            if($this->saved_user_data) {
                $checked = in_array($key, $this->saved_user_data);
                $checked_html = $checked ? 'checked=checked' : '';
                if($this->show_solution) {
                    if($valid_value === "both") {
                        $correct = true;
                        $correct_text = "Both options are right";
                    } else { // either true or false is correct
                        $correct = $checked == $valid_value;
                        $correct_text = $correct ? "Correct!" : "Wrong";
                    }
                } else {
                    $correct_text = "";#"Correct solution revealed tomorrow";
                }

                $correct_class = $correct ? "correct" : "wrong";
                $correct_text = $correct_text ? "<span class='$correct_class'>$correct_text</span>" : "";
                print "<div><input type='checkbox' $checked_html disabled=disabled> $key $correct_text</div>";
            } else {
                $disabled_html = $this->token && !$this->show_solution ? "" : "disabled=disabled";
                $checked_html = $this->show_solution && $valid_value ? "checked=checked" : "";
                $key = htmlentities($key);
                print "<div><label for='$id'><input type='checkbox' name='{$this->field_name_php}' id='$id' $checked_html value='$key' $disabled_html> $key</label></div>";
            }
        }
    }
    
    function hand_in() {
        if(!$this->show_solution && !$this->submitted_data && !$this->saved_user_data)
            print '<p><button type="submit">Hand in</button></p><p>You cannot change your answers afterwards! Results will displayed tommorrow.</p>';
    }
    
};

// Kind of the same but for numbers...

class NumberQuiz {
    function __construct($day) {
        global $today, $token; // from global index
        $this->show_solution = $day < $today;
        $this->field_name = "numericInput" . $day;
        $this->token = $token;

        // Path is relative to index.php...
        $this->storage_file = "../user_data/day" . sprintf("%02d", $day) . ".csv";

        // Check if data was submitted
        $this->submitted_data = isset($_POST[$this->field_name]) ? $_POST[$this->field_name] : null;

        // Load user data if available
        if (file_exists($this->storage_file)) {
            foreach (file($this->storage_file) as $line) {
                list($storage_token, $storage_data) = explode(" ", $line, 2);
                if ($storage_token == $this->token) {
                    $this->saved_user_data = $storage_data; #json_decode($storage_data, true);
                    break;
                }
            }
        }
    }

    function print() {
        if (!$this->show_solution) { // Poll still open
            if ($this->token) {
                print "<p class='info'>You are logged in as <em>{$this->token}</em></p>";
                
                if ($this->saved_user_data) {
                    print "<p class='info'>Thanks for participating in this day. Your answer: <strong>{$this->saved_user_data} %</strong>. Results are revealed tomorrow.</p>";
                } elseif ($this->submitted_data !== null) { // Submitting data
                    $dataline = $this->token . ' ' . json_encode($this->submitted_data) . "\n";
                    file_put_contents($this->storage_file, $dataline, FILE_APPEND);
                    print "<p class='info'>Your reply has been saved!</p>";
                    $this->saved_user_data = $this->submitted_data;
                } else {
                    print "<p><label for='{$this->field_name}'>Enter a number: <input type='number' name='{$this->field_name}' id='{$this->field_name}' required> %</label></p>";
                }
            } else {
                print "<p class='info'>Hint: The quiz is open but you have not registered, so you cannot participate. Please <a href='?user'>register first</a>, then submit your answer.</p>";
            }
        } else { // Poll closed
            if ($this->saved_user_data !== null) {
                $correct = call_user_func($this->check_callback, $this->saved_user_data);
                $status = $correct ? "Valid" : "Wrong";
                print "<p class='info'>This day quiz is closed. You participated as <em>{$this->token}</em>. Your answer: <strong>{$this->saved_user_data} %</strong>. Result: <strong>{$status}</strong>.</p>";
            } else {
                print "<p class='info'>This day quiz is already closed. You are logged in as <em>{$this->token}</em> and did not participate. Correct solution: <strong>" . $this->correct_solution . "</strong>.</p>";
            }
        }
    }

    function hand_in() {
        if (!$this->show_solution && !$this->submitted_data && !$this->saved_user_data) {
            print '<p><button type="submit">Hand in</button></p><p>You cannot change your answer afterwards! Results will be displayed tomorrow.</p>';
        }
    }
}
