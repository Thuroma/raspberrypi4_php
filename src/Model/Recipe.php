<?php

namespace Model;

class Recipe
{
    // Attributes
    private $recipe_id;
    private $name;
    private $description;

    // Constructors
    public function __construct($recipe_id, $name, $description) {
        $this->recipe_id = $recipe_id;
        $this->name = $name;
        $this->description = $description;
    }

    // Getters
    public function getId() {
        return $this->recipe_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}

?>