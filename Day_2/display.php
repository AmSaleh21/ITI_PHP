<?php

$imported_user_data = file("data.txt");
$constants = array("Visit Date", "IP Adress", "Email Adress", "Name");

foreach ($imported_user_data as $key => $value) {
    echo "user $key </br>";
    $value_split = explode(",", $value);
    foreach ($value_split as $index => $val) {
        echo "<center> " . $constants[$index] . ": " . $val . " </br> </center>";
    }
    echo "</br> <hr /> </br>";
}
