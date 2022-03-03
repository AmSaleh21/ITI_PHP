<?php

echo "<table>";
echo "<tr>";
echo "<th>Item ID</th>";
echo "<th>Name</th>";
echo "<th>Details</th>";
echo "</tr>";
foreach ($all_items as $item) {
    echo "<tr>";
    echo "<td>$item->id</td>";
    echo "<td>$item->product_name</td>";
    echo "<td><a href='http://localhost/labs/Day_4/?id=$item->id'>more</a></td>";
    echo "</tr>";
}
echo "</table>";
?>

<div>
    <a href="<?php echo $previous_link;  ?>">
        << Prev </a> | <a href="<?php echo $next_link;  ?>"> Next >> </a>
</div>