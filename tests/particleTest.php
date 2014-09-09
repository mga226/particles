<?php

require_once(__DIR__.'/../autoload.php');

class ParticleTest extends PHPUnit_Framework_TestCase
{

	var $particle;

  public function setUp(){ 
  	$this->particle = new Particle(4,1); // position, speed

  }
  public function tearDown(){
  	unset ($this->particle);
   }


  public function testGetPositionReturnsPosition(){
  	$this->assertEquals(4, $this->particle->getPosition());
  }

  public function testGetSpeedReturnsSpeed(){
  	$this->assertEquals(1, $this->particle->getSpeed());
  }

  public function testUpdateChangesPositionByCurrentSpeed(){
  	$this->particle->update();
  	$this->assertEquals(5, $this->particle->getPosition());
  }



 // public function testUpdateChangesPositionByCurrentSpeed()


}
?>