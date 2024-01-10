<?php

namespace Model;

class RecipeManager
{
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
}

?>