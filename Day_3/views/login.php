<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="views/login_style.css">
</head>

<body>

</body>

</html>

<body>
    <center>
        <h1> Student Login Form </h1>
    </center>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];    ?>">
        <div class="container">
            <label class="pad">Username : </label>
            <input class="input-fields" type="text" placeholder="Enter Username" name="username" required>

            <label class="pad">Password : </label>
            <input class="input-fields" type="password" placeholder="Enter Password" name="password" required>

            <button class="buttons" id="submit" type="submit">Login</button>
            <input class="pad" type="checkbox" checked="checked" name="rememberme"> Remember me
            <button class="buttons" id="cancel-button" type="button"> Cancel</button>
            <label class="pad"> Forgot <a href="#"> password? </a> </label>
        </div>
    </form>
</body>

</html>