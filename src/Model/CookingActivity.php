<?php

namespace Model;

class CookingActivity
{
    // Attributes
    private $activity_id;
    private $recipe_id;
    private $chef_id;
    private $cook_id;
    private $start_time;
    private $end_time;

    // Constructors
    public function __construct($activity_id, $recipe_id, $chef_id, $cook_id, $start_time, $end_time) {
        $this->activity_id = $activity_id;
        $this->recipe_id = $recipe_id;
        $this->chef_id = $chef_id;
        $this->cook_id = $cook_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

    // Getters
    public function getActivityId() {
        return $this->activity_id;
    }

    public function getRecipeId() {
        return $this->recipe_id;
    }

    public function getChefId() {
        return $this->chef_id;
    }

    public function getCookId() {
        return $this->cook_id;
    }

    public function getStartTime() {
        return $this->start_time;
    }

    public function getEndTime() {
        return $this->end_time;
    }


    // Setters
    public function setRecipeId($recipe_id) {
        $this->recipe_id = $recipe_id;
    }

    public function setChefId($chef_id) {
        $this->chef_id = $chef_id;
    }

    public function setCookId($cook_id) {
        $this->cook_id = $cook_id;
    }

    public function setStartTime($start_time) {
        $this->start_time = $start_time;
    }

    public function setEndTime($end_time) {
        $this->end_time = $end_time;
    }
}

?>