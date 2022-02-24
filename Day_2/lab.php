<?php
require_once 'config.php';
$error_message = array();
$success = false;
$vars = [
    'email' => '',
    'name' => '',
    'message' => ''
];

//Counter to check how many times the user opened the page
session_start();
$visit_time = 0;
if (!isset($_SESSION["is_visited"])) {
    $visit_time = 0;
    $_SESSION["is_visited"] = true;
} else {
    $_SESSION["counter"] = isset($_SESSION["counter"]) ? $_SESSION["counter"] + 1 : 2;
    $visit_time = $_SESSION["counter"];
}


//check and validate the data after submission
if (isset($_POST["submit"])) {

    $vars['name'] = $_POST['name'];
    $vars['email'] = $_POST['email'];
    $vars['message'] =  $_POST['message'];

    //name validation
    if (!empty($_POST["name"])) {
        if (!isset($_POST["name"]) || strlen($_POST["name"]) > USER_NAME) {
            $error_message[] = "** ERROR: name too long > 100 characters";
        } else if (is_numeric($_POST["name"])) {
            $error_message[] = "** ERROR: name cannot be numbers";
        }
    } else {
        $error_message[] = 'Name is required';
    }

    //email validation
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error_message[] = "** ERROR: not a valid email";
        } else if (is_numeric($_POST["email"])) {
            $error_message[] = "** ERROR: mail cannot be in numbers";
        }
    } else {
        $error_message[] = 'email is required';
    }

    //message validation
    if (isset($_POST["message"])) {
        if (strlen($_POST["message"]) < MESSAGE_LENGTH) {
            $error_message[] = "** ERROR: message is small < 255 characters";
        } else if (empty($_POST["message"])) {
            $error_message[] = '** ERROR: message is required';
        }
    }
    $success = count($error_message) === 0;
}

function get_data($data)
{
    if (isset($_POST[$data])) {
        echo $_POST[$data];
    } else {
        echo "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="after_submit">
        <?php
        if ($success) {

            $fp = fopen("data.txt", "a+");
            $date = date('m/d/Y h:i:s a', time());
            fwrite($fp, "$date");
            fwrite($fp, ", " . $_SERVER['REMOTE_ADDR']);

            foreach ($vars as $key => $value) {
                if ($key !== "message") {
                    $line = ", $value";
                    fwrite($fp, $line);
                }
            }

            fwrite($fp, PHP_EOL);
            fclose($fp);
            echo "<hr />";
            echo "<h2>Thank you For Contacting Us";
            echo "<hr />";

            exit();
        }
        ?>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <div class="container">
            <p><?php 
                // echo "<center>First Visit, Hello!</center>";
                // echo "<center> you visited this page " . $_SESSION["counter"] . " times </center>";
                if($visit_time == 0){
                    echo "<center>First Visit, Hello!</center>";
                }else{
                    echo "<center> you visited this page " . $visit_time . " times </center>";
                }
            ?></p>
            <input class="input-fields" placeholder="Enter your email" name="email" value="<?php echo get_data("email"); ?>">
            <input class="input-fields" placeholder="Enter your name" class="input" name="name" type="text" value="<?php echo get_data("name"); ?>" size="30" /><br />
            <textarea class="input-fields" id="message" class="input" name="message" rows="7" cols="30" value="<?php echo get_data("message"); ?>"></textarea><br />
            <div class="buttons-div flex">
                <input class="buttons" id="submit" name="submit" type="submit" value="Send email" />
                <input class="buttons" id="clear" name="clear" type="reset" value="clear form" />
            </div>
            <div id="error-messages">
                <?php
                if (count($error_message) > 0) {
                    echo "<ul>";
                    foreach ($error_message as $error) {
                        echo "<li class='error'> $error </li>";
                    }
                    echo "</ul>";
                }
                ?>
            </div>
        </div>

    </form>

</body>

</html>