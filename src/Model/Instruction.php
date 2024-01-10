<?php

namespace Model;

class Instruction
{
    // Attributes
    private $instruction_id;
    private $instruction;

    // Constructors
    public function __construct($instruction_id, $instruction) {
        $this->instruction_id = $instruction_id;
        $this->instruction = $instruction;
    }

    // Getters
    public function getId() {
        return $this->instruction_id;
    }

    public function getInstruction() {
        return $this->instruction;
    }

    // Setters
    public function setInstruction($instruction) {
        $this->instruction = $instruction;
    }
}

?>