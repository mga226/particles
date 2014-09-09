<?php
require_once (__DIR__ . '/../autoload.php');

class ChamberTest extends PHPUnit_Framework_TestCase
{
    
    var $chamber;
    var $emptyChamber;
    
    public function setUp() {
        
        // create a chamber a populate it with a particle
        $particles = array(new Particle(1, 2));
        
        $this->chamber = new Chamber(10, $particles); // size, array of particles
        
        // make an empty chamber
        $this->emptyChamber = new Chamber(10, array());
    }
    
    public function tearDown() {
        unset($this->chamber);
    }
    
    public function testGetSizeShouldReturnSize() {
        $this->assertEquals($this->chamber->getSize(), 10);
    }
    
    public function testGetParticlesShouldReturnArrayOfParticles() {
        $this->assertContainsOnlyInstancesOf('Particle', $this->chamber->getParticles());
    }
    
    public function testUpdateShouldMoveParticles() {
        $this->chamber->update();
        $particles = $this->chamber->getParticles();
        $testParticle = $particles[0];
        
        // we just created the one, and we know what its position should be now
        
        $this->assertEquals(3, $testParticle->getPosition());
    }
    
    public function testEmptyChamberIsEmpty() {
        $this->assertEquals(array(), $this->emptyChamber->getParticles());
    }
    
    public function testIsEmptyShouldReturnTrueIfChamberIsEmpty() {
        $this->assertTrue($this->emptyChamber->isEmpty());
    }
    
    public function testIsEmptyShouldReturnFalseIfChamberContainsParticles() {
        $this->assertFalse($this->chamber->isEmpty());
    }
    
    public function testMovingAParticleOutOfChamberShouldDeleteThatParticle() {
        
        // Yes, this is a weirdly written test and relies on ::update() working.

        $this->chamber->update(); // 3
        $this->chamber->update(); // 5
        $this->chamber->update(); // 7
        $this->chamber->update(); // 9
        $this->chamber->update(); // 11, out of the chamber!
        
        $this->assertTrue($this->chamber->isEmpty());
    }
}
?>