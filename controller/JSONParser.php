<?php
/**
 * ToDo
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
require_once ('model/Connection.php');
require_once ('model/Journey.php');
require_once ('model/JourneyDetails.php');
session_start();
class JSONParser {
	public function getConnection($jsonString) {
		$data = json_decode ( $jsonString );
		$connections = array ();
		
		if ($data->from && $data->to) {		
			if (isset ( $data->connections [0] )) {
				foreach ( $data->connections as $result ) {
					$connection = new Connection ();
					
					$connection->setFrom ( $result->from->station->name );
					$connection->setTo ( $result->to->station->name );
					
					$connection->setDuration ( $result->duration );
					$connection->setTransfers ( $result->transfers );
					
					foreach ( $result->sections as $journeyResult ) {
						if (isset ( $journeyResult->journey )) {
							// var_dump ($journeyResult);
							$journey = new Journey ();
							$journey->setName ( $journeyResult->journey->name );
							$journey->setCategory ( $journeyResult->journey->category );
							
							$departure = new JourneyDetails ();
							$departure->setTime ( $journeyResult->departure->departure );
							$departure->setPlatform ( $journeyResult->departure->platform );
							$departure->setLocation ( $journeyResult->departure->station->name );
							
							$journey->setDeparture ( $departure );
							
							$arrival = new JourneyDetails ();
							$arrival->setTime ( $journeyResult->arrival->arrival );
							$arrival->setPlatform ( $journeyResult->arrival->platform );
							$arrival->setLocation ( $journeyResult->arrival->station->name );
							
							$journey->setArrival ( $arrival );
							
							$connection->addJourney ( $journey );
						} else if(isset ( $journeyResult->walk )) {
							//ToDo
						} else {
							//ToDo is necessary
						}
					}
					array_push($connections, $connection);
				}
			}
		}
		
		// echo $connection->getFrom(), "<br>";
		// echo $connection->getTo(), "<br>";
		// echo $connection->getDuration(), "<br>";
		// echo $connection->getTransfers(), "<br>";
		// var_dump($connection->getJourney());
// 		var_dump($connections);
		return($connections);
	}
}