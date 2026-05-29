<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QueryResults</title>
</head>
<body>
    <h1>Query Results from the Connected Database</h1>

    <h2>First Query Results</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Price</th>
            <th>Year</th>
        </tr>
    <?php
        require_once "../settings.php";
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if ($dbconn) {
            $query = "SELECT * FROM cars";
            $result = mysqli_query($dbconn, $query);
            
            if ($result) {                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" .$row['car_id'] ."</td>";
                    echo "<td>" .$row['make'] ."</td>";
                    echo "<td>" .$row['model'] ."</td>";
                    echo "<td>" .$row['price'] ."</td>";
                    echo "<td>" .$row['yom'] ."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<p> There are no cars to display</p>";
            }
            // mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to the db.</p>";
        }
    ?>
    </table>

    <h2>Second Query Results</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Price</th>
        </tr>
    <?php
        if ($dbconn) {
            $query = "SELECT make, model, price FROM cars ORDER BY make, model";
            $result = mysqli_query($dbconn, $query);
            
            if ($result) {                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" .$row['make'] ."</td>";
                    echo "<td>" .$row['model'] ."</td>";
                    echo "<td>" .$row['price'] ."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<p> There are no cars to display</p>";
            }
            // mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to the db.</p>";
        }
    ?>
    </table>

    <h2>Third Query Results</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Make</th>
            <th>Model</th>
        </tr>
    <?php
        if ($dbconn) {
            $query = "SELECT make, model FROM cars WHERE price >= 20000";
            $result = mysqli_query($dbconn, $query);
            
            if ($result) {                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" .$row['make'] ."</td>";
                    echo "<td>" .$row['model'] ."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<p> There are no cars to display</p>";
            }
            // mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to the db.</p>";
        }
    ?>
    </table>

    <h2>Fourth Query Results</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Make</th>
            <th>Price</th>
        </tr>
    <?php
        if ($dbconn) {
            $query = "SELECT make, AVG(price) FROM cars GROUP BY make";
            $result = mysqli_query($dbconn, $query);
            
            if ($result) {                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" .$row['make'] ."</td>";
                    echo "<td>" .$row['AVG(price)'] ."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<p> There are no cars to display</p>";
            }
            // mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to the db.</p>";
        }
    ?>
    </table>

    <h2>Fifth Query Results</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Make</th>
            <th>Model</th>
        </tr>
    <?php
        if ($dbconn) {
            $query = "SELECT make, model FROM cars WHERE price < 15000 AND price > 10000";
            $result = mysqli_query($dbconn, $query);
            
            if ($result) {                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" .$row['make'] ."</td>";
                    echo "<td>" .$row['model'] ."</td>";
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