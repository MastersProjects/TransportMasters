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
}