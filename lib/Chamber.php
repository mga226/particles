<?php

/**
 * A simulation of a one-dimensional chamber, containing
 * any number of particles. 
 *
 * @package Animation
 * @author Mike Acreman
 */
class Chamber
{
    protected $size;
    protected $particles = array();
    
    /**
     * @param integer $size      The size of the chamber
     * @param array   $particles An array of instances of Particle
     */
    public function __construct($size = 10, $particles = array()) {
        
        if (!is_int($size)) {
            throw new InvalidArgumentException('A chamber\'s size must be an integer');
        }
        
        $this->size = $size;
        $this->particles = $particles;
    }
    
    /**
     * Move the clock forward one tick, updating
     * the state of each particle, and remove any
     * particles that have floated out of the chamber.
     */
    public function update() {
        
        // update each particle
        foreach ($this->particles as $i => & $particle) {
            $particle->update();
            
            // Remove the particle from the chamber if it is out of range
            if (!$this->particleIsWithinRange($particle)) {
                unset($this->particles[$i]);
            }
        }
    }
    
    /**
     * @return integer
     */
    public function getSize() {
        return $this->size;
    }
    
    /**
     * @return array  An array of Particle instances
     */
    public function getParticles() {
        return $this->particles;
    }
    
    /**
     * @return boolean  TRUE if there are no particles in the chamber.
     */
    public function isEmpty() {
        if (empty($this->particles)) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * Determines whether the particle provided
     * is inside the range of valid positions
     * for this chamber (0..$length)
     *
     * @param  Particle $particle
     * @return  bool
     */
    protected function particleIsWithinRange(Particle $particle) {
        $position = $particle->getPosition();
        if ($position < 0 || $position >= $this->size) {
            return FALSE;
        }
        return TRUE;
    }
}
