<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <?php
        require_once "../settings.php";
        
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        
        if (!$conn) {
            echo "<p>Unable to connect to the database.</p>";
            exit;
        }
        
        if (isset($_GET['model'])) {
            $model = mysqli_real_escape_string($conn, $_GET['model']);
            
            // $sql = "SELECT * FROM cars WHERE model = '$model'";
            $sql = "SELECT * FROM cars WHERE model LIKE '%$model%'";
        
            $result = mysqli_query($conn, $sql);
        
            if (mysqli_num_rows($result) > 0) {
        
                echo "<p>Results for: <strong>" .htmlspecialchars($model) ."</strong></p>";
        
                echo "<table border='1' cellpadding='5'>";
                echo "<tr>
                        <th>ID</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Year</th>
                      </tr>";
        
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['car_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['make'])   . "</td>";
                    echo "<td>" . htmlspecialchars($row['model'])  . "</td>";
                    echo "<td>$" . number_format($row['price'], 2) . "</td>";
                    echo "<td>" . htmlspecialchars($row['yom'])    . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "🚫 No matching cars found.";
            }
        } else {
            echo "Please enter a model to search.";
        }
        
        mysqli_close($conn);
    ?>
</body>
</html>