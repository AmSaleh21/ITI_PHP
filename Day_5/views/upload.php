<?php
session_start();
require_once("../vendor/autoload.php");

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

if (isset($_POST["upload"])) {
    if ($_FILES["glasses-img"]["type"] == "image/png" || $_FILES["glasses-img"]["type"] == "image/jpeg") {
        $dpconnector = new DatabaseConnector();
        $connection = $dpconnector->getDbc();
        $rand_id = rand(100, 6000);
        $connection->table("items")->insert([
            'id' => $rand_id,
            "Photo" => $_FILES["glasses-img"]["name"],
            "product_name" => $_POST["glassname"]
        ]);
        $tempname = $_FILES["glasses-img"]["tmp_name"];

        move_uploaded_file($_FILES["glasses-img"]["tmp_name"], "../Resources/images/" . $_FILES["glasses-img"]["name"]);
        echo "<h4> file uploaded successfully";
    }
}
?>
<html>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="glassname" placeholder="Enter the name of the glass">
        <input type="file" name="glasses-img">
        <input type="submit" name="views/upload" value="upload">
        <a href='http://localhost/labs/Day_5/views/items.php'> back </a>
    </form>
</body>

</html>