<?php
echo "<center>  User Profile Page   </center>";
//var_dump($my_user);

$counter = file("log.txt");
echo "<h2>Counted Unique Visitors:</h2>" . $counter[0];
