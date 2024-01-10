<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Recipes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        
    <header>
        <h1>Welcome to My PHP Page</h1>
    </header>

    <div class="row">

    <div class="col" id="calendar">
        <p>Calendar goes here</p>
    </div>

    <div class="col">

    <div class="row">
        <div id="recipes">
            <?php
                // Include config file
                include_once "../config.php";

                include "../src/Model/Chef.php";
                include "../src/Model/Cook.php";
                include "../src/Model/CookingActivity.php";
                include "../src/Model/Ingredient.php";
                include "../src/Model/Instruction.php";
                include "../src/Model/Recipe.php";
                include "../src/Model/RecipeManager.php";

                // Create Connection
                $conn = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }


                if(class_exists('getAllRecipes')){
                    echo "Class Found";
                }else{
                    echo "Class NOT Found";
                }
                // $recipeManager = new RecipeManager($conn);

                // try {
                //     $allRecipes = $recipeManager->getAllRecipes();
                    
                //     print_r($allRecipes);

                // } catch (Exception $e) {
                //     echo "Error: " . $e->getMessage();
                // }
            ?>
        </div>
    </div>

    <div class="row">
        <div id="staff">
            <p>Cooks go here</p>
        </div>
    </div>

    </div>

    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?></p>
    </footer>

    </div>
</body>
</html>
