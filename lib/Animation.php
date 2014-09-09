<?php

/**
 * This class just exists to satisfy the requirements
 * of the test! All the magic happens elsewhere.
 * 
 * @author  Mike Acreman
 * @package Animation
 */
class Animation{

	/**
	 * We inject chamberIO as a dependency to decouple it from
	 * the internal workings of the chamber/particle simulation, and from
	 * this class.
	 * @see  ChamberIO.php for more on the role of the ChamberIO interface
	 * @param  ChamberIO $chamberIO 
	 */
	public function __construct(ChamberIO $chamberIO = NULL){

		if(empty($chamberIO)){
			$chamberIO = new ChamberIO_ASCII();
		}
		$this->chamberIO = $chamberIO;

	}

	/**
	 * Create and simulate the movements of particles
	 * within a chamber.
	 * @param  integer $speed  Number of spaces a particle moves during 1 update loop
	 * @param  string $init    Initial state as a string, parsable by $this->chamberIO
	 * @return array           An array of "snapshot" strings as returned by $this->chamberIO
	 */
	public function animate($speed, $init){

		if($speed == 0){
			throw new InvalidArgumentException('Animation::animate() speed cannot be zero, or the animation will never complete.');
		}

		$chamber = $this->chamberIO->createChamber($speed, $init);

		// Take a snapshot of the initial state.
		$animationSnapshots = array(
			$this->chamberIO->createSnapshot($chamber)
		);

		/* 
			Update the chamber until all particles have left,
			taking snapshots of each state.
		*/
		while(!$chamber->isEmpty()){
			$chamber->update();
			$animationSnapshots[] = $this->chamberIO->createSnapshot($chamber); 
		}

		return $animationSnapshots;

	}

}