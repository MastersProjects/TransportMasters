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

Class JSONParser{
	public function getConnection($jsonString) {
		$connection = new Connection();
		$data = json_decode($jsonString);
			
		if ($data->from) {
			$from = $data->from->name;
			$connection->setFrom($from);
		}

		if ($data->to) {
			$to = $data->to->name;
			$connection->setTo($to);
		}

		if (isset($data->connections[0])) {
			foreach ($data->connections as $result) {
				$connection->setDuration($result->duration);
				$connection->setTransfers($result->transfers);

				foreach($result->sections as $journeyResult){
					if (isset($journeyResult->journey)){
// 						var_dump ($journeyResult);
						$journey = new Journey();
						$journey->setName($journeyResult->journey->name);
						$journey->setCategory($journeyResult->journey->category);
						
						
						$departure = new JourneyDetails();
						$departure->setTime($journeyResult->departure->departure);
						$departure->setPlatform($journeyResult->departure->platform);
						$departure->setLocation($journeyResult->departure->station->name);
						
						$journey->setDeparture($departure);
						
						$arrival = new JourneyDetails();
						$arrival->setTime($journeyResult->arrival->arrival);
						$arrival->setPlatform($journeyResult->arrival->platform);
						$arrival->setLocation($journeyResult->arrival->station->name);

						$journey->setArrival($arrival);
						
						$connection->addJourney($journey);
					} else {
						//ToDo when walk 
					}
				}
			}
		}


		// 		echo $connection->getFrom(), "<br>";
		// 		echo $connection->getTo(), "<br>";
		// 		echo $connection->getDuration(), "<br>";
		// 		echo $connection->getTransfers(), "<br>";
		//var_dump($connection->getJourney());

		return $connection;
	}
}