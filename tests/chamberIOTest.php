<?php
require_once (__DIR__ . '/../autoload.php');

class ChamberIOTest extends PHPUnit_Framework_TestCase
{
    
    var $chamberIO;
    
    public function setUp() {
        $this->chamberIO = new ChamberIO_ASCII();
    }
    
    public function tearDown() {
        unset($this->chamberIO);
    }
    
    public function testChamberIOCreateChamberReturnsChamber() {
        $this->assertInstanceOf('Chamber', $this->chamberIO->createChamber(1, 'R..L'));
    }
    
    public function testChamberIOCreateChamberReturnsCorrectChamber() {
        $chamber = $this->chamberIO->createChamber(1, 'R..L');
        
        $this->assertEquals($chamber->getSize(), 4);
        
        $particles = $chamber->getParticles();
        
        $this->assertCount(2, $particles);
        
        $this->assertEquals($particles[0]->getPosition(), 0);
        $this->assertEquals($particles[1]->getPosition(), 3);
    }
    
    public function testChamberIOCreateSnapshotReturnsString() {
        $chamber = $this->chamberIO->createChamber(1, 'R..L');
        $this->assertInternalType('string', $this->chamberIO->createSnapshot($chamber));
    }
    
    public function testChamberIOCreateSnapshotReturnsCorrectString() {
        $chamber = $this->chamberIO->createChamber(1, 'R..L');
        $this->assertEquals('X..X', $this->chamberIO->createSnapshot($chamber));
    }


}
?>