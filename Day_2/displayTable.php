<!-- /*

/    visit date      IP ADRESS       email        name  <th>

0   date 1          ip1             em1           n1    <td>
1   date 2          ip2             em2           n2    <td>
0   date 3          ip3             em3           n3    <td>

*/ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login data</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    table {
        width: 450px;
        height: relative;
        margin: 35px auto;
        font-family: 'Raleway';
        position: relative;
        top: 50%;
        transform: translate(10%, 10%);
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
    <table>
        <tr>
            <th>user</th>
            <th>Visit Date</th>
            <th>IP Adress</th>
            <th>Email Adress</th>
            <th>Name</th>
        </tr>
        <?php

        $imported_user_data = file("data.txt");
        $constants = array("Visit Date", "IP Adress", "Email Adress", "Name");

        foreach ($imported_user_data as $key => $value) {
            echo "<tr>";
            echo "<td> $key </td>";
            $value_split = explode(",", $value);
            foreach ($value_split as $index => $val) {
                echo "<td> " . $val . "</td>";
            }
        }
        ?>
    </table>
</body>

</html>