

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
</head>
<style>
    table {
        width: 500px;
        height: relative;
        margin: 35px auto;
        font-family: 'Raleway';
        position: relative;
        background-color: #fff;
        border: 2px grey solid;
        border-radius: 10px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 0px 35px;
        justify-content: center;
    }
</style>
<body>   

<div>
    <!-- search -->
    
</div>

<div>
<?php
    echo "<table>";
    echo "<tr>";
    echo "<th>Item ID</th>";
    echo "<th>Name</th>";
    echo "<th>Details</th>";
    $current = (isset($_GET["index"]))? $_GET["index"] : 0;
    echo "<th>items " . $current . " of ". _max_pages_index_ ."</th>";
    echo "</tr>";
    foreach ($all_items as $item) {
        echo "<tr>";
        echo "<td>$item->id</td>";
        echo "<td>$item->product_name</td>";
        
        $image_name = $item->Photo;
        $image_name_array = explode(".", $image_name);   
        $image_name = $image_name_array[0] . "tz.png";

        echo "<td><image src='images/$image_name'> </image></td>";
        echo "<td><a href='http://localhost/labs/Day_4/?id=$item->id'>more</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
</div>
<div>
    <center>
    <a href="<?php echo $previous_link;  ?>">
        << Prev </a> | <a href="<?php echo $next_link;  ?>"> Next >> </a>
    </center>
</div>
</body>
</html>