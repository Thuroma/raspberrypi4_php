<?php

namespace Model;

class RecipeManager {
    // Attribute is the connection to the database
    private $conn;

    // Constructors
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Methods
    public function getAllRecipes() {

        $sql = "SELECT * FROM Recipe";

        $result = $this->conn->query($sql);

        if (!$result) {
            throw new Exception("Error fetching recipes: " . $this->conn->error);
        }

        $recipes = [];

        while ($row = $result->fetch_assoc()) {
            // $recipes[] = [
            //     'id' => $row['recipe_id'],
            //     'name' => $row['name'],
            //     'description' => $row['description']
            // ];
            $recipes[] = $row;
        }

        return $recipes;
        
    }

    public function getRecipeCards() {
        // Get all recipes with ingredients
        $sql = "SELECT
                    Recipe.recipe_id,
                    Recipe.name,
                    Recipe.description,
                    GROUP_CONCAT(Ingredient.name SEPARATOR ', ') AS ingredient_list,
                    GROUP_CONCAT(Instruction.instruction SEPARATOR ', ') AS instruction_list
                FROM
                    Instruction
                INNER JOIN
                    RecipeInstruction ON Instruction.instruction_id = RecipeInstruction.instruction_id
                INNER JOIN
                    Recipe ON RecipeInstruction.recipe_id = Recipe.recipe_id
                INNER JOIN
                    RecipeIngredient ON Recipe.recipe_id = RecipeIngredient.recipe_id
                INNER JOIN
                    Ingredient ON RecipeIngredient.ingredient_id = Ingredient.ingredient_id
                GROUP BY
                    Recipe.recipe_id
                ORDER BY
                    Recipe.recipe_id";

        $result = $this->conn->query($sql);

        if (!$result) {
            throw new Exception("Error fetching recipes: " . $this->db->error);
        }

        $recipes = [];

        while ($row = $result->fetch_assoc()) {
            $recipes[] = [
                'id' => $row['recipe_id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'ingredients' => $row['ingredient_list'],
                'instructions' => $row['instruction_list'],
            ];
        }

        return $recipes;
        
    }
}

?>