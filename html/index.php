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

            $recipeSelection = 1;

            $sql = "SELECT * FROM Recipe WHERE recipe_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $recipeSelection);
            $stmt->execute();
            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                // Process each row
                echo $row;
            }
            
            $stmt->close();
        ?>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?></p>
    </footer>

</body>
</html>
