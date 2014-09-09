<?php

/**
 * A simulation of a particle. Updating the particle
 * moves it to its next position.
 *
 * @package Animation
 * @author Mike Acreman
 */
class Particle
{
    
    protected $speed;
    protected $position;
    
    /**
     * @param int $position Initial position of the particle in space
     * @param int $speed    Speed of the particle (left-moving particles have negative speed)
     */
    public function __construct($position = 0, $speed = 0) {
        if (!is_int($position)) {
            throw new InvalidArgumentException('A particle\'s position must be an integer.');
        }
        if (!is_int($speed)) {
            throw new InvalidArgumentException('A particle\'s speed must be an integer.');
        }
        
        $this->position = $position;
        $this->speed = $speed;
    }
    
    /**
     * Return the current position
     * @return int
     */
    public function getPosition() {
        return $this->position;
    }
    
    /**
     * Return the current speed
     * @return int
     */
    function getSpeed() {
        return $this->speed;
    }
    
    /**
     * One tick of the clock. Moves the particle
     * the distance of its current speed.
     */
    function update() {
        $this->position+= $this->speed;
    }
}
