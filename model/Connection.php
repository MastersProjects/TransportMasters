<?php
/**
 * This Class is used for writing the information's received
 * from the JSON into an PHP object. This is an modell Class,
 * see also UML
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
require_once 'Journey.php';

Class Connection{
	private $from;
	private $to;
	private $duration;
	private $journey;
	private $departureTime;
	private $arivallTime;
	private $transfers;	
	
	function __construct() {
		$this->journey = new Journey();
	}
	
	public function getFrom(){
		return $this->from;
	}
	
	public function setFrom($from){
		$this->from = $from;
	}
	
	public function getTo(){
		return $this->to;
	}
	
	public function setTo($to){
		$this->to = $to;
	}
	
	public function getDuration(){
		return $this->duration;
	}
	
	public function setDuration($duration){
		$this->duration = $duration;
	}
	
	public function getJourney(){
		return $this->journey;
	}
	
	public function setJourney($journey){
		$this->journey = $journey;
	}
	
	public function getDepartureTime(){
		return $this->departureTime;
	}
	
	public function setDepartureTime($departureTime){
		$this->departureTime = $departureTime;
	}
	
	public function getArivallTime(){
		return $this->arivallTime;
	}
	
	public function setArivallTime($arivallTime){
		$this->arivallTime = $arivallTime;
	}
	
	public function getTransfers(){
		return $this->transfers;
	}
	
	public function setTransfers($transfers){
		$this->transfers = $transfers;
	}
}