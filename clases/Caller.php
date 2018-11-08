<?php

class Caller {
    private $id;
    private $last_checkout;
    private $score;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of last_checkout
     */ 
    public function getLast_checkout()
    {
        return $this->last_checkout;
    }

    /**
     * Set the value of last_checkout
     *
     * @return  self
     */ 
    public function setLast_checkout($last_checkout)
    {
        $this->last_checkout = $last_checkout;

        return $this;
    }

    /**
     * Get the value of score
     */ 
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @return  self
     */ 
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }
}

?>