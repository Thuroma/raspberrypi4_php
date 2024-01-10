<?php

namespace Model;

class Chef
{
    // Attributes
    private $chef_id;
    private $name;

    // Constructors
    public function __construct($chef_id, $name) {
        $this->chef_id = $chef_id;
        $this->name = $name;
    }

    // Getters
    public function getId() {
        return $this->chef_id;
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