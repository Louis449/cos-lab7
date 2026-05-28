<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QueryResults</title>
</head>
<body>
    <h1>Query Results from the Connected Database</h1>

    <table border="1">
        <th>car_id</th>
        <th>make</th>
        <th>model</th>
        <th>price</th>
        <th>year of make</th>
    <?php
        require_once "settings.php";
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if ($dbconn) {
            // $query = "SELECT * FROM cars";
            // $query = "SELECT make, model, price FROM cars ORDER BY make, model";
            // $query = "SELECT make, model FROM cars WHERE price >= 20000";
            // $query = "SELECT make, AVG(price) FROM cars GROUP BY make";
            $query = "SELECT make, model FROM cars WHERE price < 15000 AND price > 10000";
            $result = mysqli_query($dbconn, $query);
            
            if ($result) {                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    if (array_key_exists('car_id', $row)) {
                        echo "<td>" .$row['car_id'] ."</td>";
                    } else {
                        echo "<td></td>";
                    }

                    if (array_key_exists('make', $row)) {
                        echo "<td>" .$row['make'] ."</td>";
                    } else {
                        echo "<td></td>";
                    }

                    if (array_key_exists('model', $row)) {
                        echo "<td>" .$row['model'] ."</td>";
                    } else {
                        echo "<td></td>";
                    }

                    if (array_key_exists('price', $row)) {
                        echo "<td>" .$row['price'] ."</td>";
                    } else {
                        echo "<td></td>";
                    }

                    if (array_key_exists('yom', $row)) {
                        echo "<td>" .$row['yom'] ."</td>";
                    } else {
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "<p> There are no cars to display</p>";
            }
            mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to the db.</p>";
        }
    ?>
    </table>
</body>
</html>