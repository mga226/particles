<?php

/**
 * The ChamberIO interface allows us to specify:
 *
 * 1) How to create a Chamber based on the format
 *    we use to provide initial conditions.
 * 2) How to create a "snapshot" of a Chamber's
 *    current state in the desired format.
 *
 * @package Animation
 * @author Mike Acreman
 */
interface ChamberIO {
    
    /**
     * Creates a Chamber object, populated with
     * Particles, based on the initial conditions
     * provided
     * @param  integer $speed
     * @param  mixed   $particles  Format depends must match the format required
     * @return Chamber
     */
    public function createChamber($speed, $particles);
    
    /**
     * Creates a "snapshot" of a Chamber's current state.
     *
     * @param  Chamber  $chamber
     * @return mixed  A representation of the Chamber's current state
     */
    public function createSnapshot(Chamber $chamber);
}

/**
 * Implementation of the ChamberIO interface for the formats
 * provided in the test question.
 */
class ChamberIO_ASCII implements ChamberIO
{
    
    /**
     * E.g., 'LRLL..LR' ===> {A Chamber instance with 6 particles}
     *
     * @param  integer $speed
     * @param  string $particlesString
     * @return Chamber
     */
    public function createChamber($speed, $particlesString) {
        
        if (!preg_match('/[RL.]+/', $particlesString)) {
            throw new InvalidArgumentException('Initial positions of particles must be a string containing only "R", "L", and "."');
        }
        
        $size = strlen($particlesString);
        $particles = array();
        
        // create all the particles
        for ($i = 0; $i < $size; $i++) {
            $char = $particlesString[$i];
            if ($char == 'R') {
                $particles[] = new Particle($i, $speed);
            } elseif ($char == 'L') {
                $particles[] = new Particle($i, ($speed * -1));
            }
        }
        
        return new Chamber($size, $particles);
    }
    
    /**
     * E.g., {A Chamber instance with 6 particles} ===> 'XXXX..XX'
     *
     * @param  Chamber  $chamber
     * @return string
     */
    public function createSnapshot(Chamber $chamber) {
        
        // create representation of an empty chamber
        $snapshot = str_repeat('.', $chamber->getSize());
        
        // throw an X anywhere there should be a particle
        foreach ($chamber->getParticles() as $particle) {
            $snapshot[ $particle->getPosition() ] = 'X';
        }
        return $snapshot;
    }
}
