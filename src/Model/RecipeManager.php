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
                    GROUP_CONCAT(Ingredient.name SEPARATOR ', ') AS ingredient_list
                    GROUP_CONCAT(Instruction.instruction SEPARATOR ', ') AS instruction_list
                FROM
                    Recipe
                JOIN
                    RecipeIngredient ON Recipe.recipe_id = RecipeIngredient.recipe_id
                JOIN
                    Ingredient ON RecipeIngredient.ingredient_id = Ingredient.ingredient_id
                JOIN
                    RecipeInstruction ON Recipe.recipe_id = RecipeInstruction.recipe_id
                JOIN
                    Instruction ON RecipeInstruction.instruction_id = Instruction.instruction_id
                GROUP BY
                    Recipe.recipe_id, Recipe.name, Recipe.description
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
                'instructions' => $row['instruction_list']
            ];
        }

        return $recipes;
        
    }
}

?>