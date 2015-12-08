<?php
/**
 * This class is used for writing the information's of the different 
 * mode of transport in an connection into an PHP object. In one 
 * Connetcion {@link Connection} it has at least one Journey object.
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
require_once 'JourneyDetails.php';

Class Journey{
	private $name;
	private $departure;
	private $arrival;
	private $category;
	
	function __construct() {
		$this->arrival = new JourneyDetails();
		$this->departure = new JourneyDetails();
	}
}