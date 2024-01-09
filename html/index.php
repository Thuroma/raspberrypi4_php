<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Recipes</title>
</head>
<body>

    <header>
        <h1>Welcome to My PHP Page</h1>
    </header>

    <section>
        <?php 
            // PHP code
            $greeting = "Hello World";
            echo "<p>{$greeting}</p>";
        ?>

        <br>

        <?php
            // Include config file
            include_once "../config.php";

            // Create Connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM Recipe";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // Fetch and display each row
                while ($row = $result->fetch_assoc()) {
                    echo $row;
                }
            } else {
                echo "No records found";
            }
            
            // Close the result set
            $result->close();
        ?>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?></p>
    </footer>

</body>
</html>
