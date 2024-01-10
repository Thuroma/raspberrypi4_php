<?php

namespace Model;

class Cook
{
    // Attributes
    private $cook_id;
    private $name;

    // Constructors
    public function __construct($cook_id, $name) {
        $this->cook_id = $cook_id;
        $this->name = $name;
    }

    // Getters
    public function getId() {
        return $this->cook_id;
    }

    public function getName() {
        return $this->name;
    }

    // Setters
    public function setName($name) {
        $this->name = $name;
    }
}

?>