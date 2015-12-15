<?php
/**
 * This class is used for writing the details about the
 * mode of transport in a Journey. One Journey {@link Journey}
 * has 2 JourneyDetails.
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */

Class JourneyDetails{
	private $time;
	private $platform;
	private $location;
	
	public function getTime(){
		return $this->time;
	}
	
	public function setTime($time){
		$this->time = $time;
	}
	
	public function getPlatform(){
		return $this->platform;
	}
	
	public function setPlatform($platform){
		$this->platform = $platform;
	}
	
	public function getLocation(){
		return $this->location;
	}
	
	public function setLocation($location){
		$this->location = $location;
	}
}