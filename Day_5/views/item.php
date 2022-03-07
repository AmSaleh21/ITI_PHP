<?php
echo "<table>"; 

echo "<tr>";
echo "<th>Details</th>";
echo "<th>Name:$item->product_name</th>";
echo "</tr>";

echo "<tr>";
echo "<td><p>Type:$item->product_name</p>
    <div class='separator'> </div>
    <p>code:$item->PRODUCT_code</p>
    <div class='separator'> </div>
    <p>item id:$item->id</p> 
    <div class='separator'> </div>
    <p>rating:$item->Rating</p>
    <div class='separator'> </div>
    <p>price:$item->list_price</p> </td>";
echo "<td> <img src='images/$item->Photo' /> <td>";
echo "</tr>";

echo "</table>";

?>


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
    .separator {
        height: 2px;
        background-color: #000;
        width: 60%;
        position: relative;
    }
</style>
<body>
</body>
</html>