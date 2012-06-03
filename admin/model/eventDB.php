<?php 
class eventDB {   
	
	public static function addEvent($name,$artist,$venue,$genre,$start,$end,$price,$age,$imageFileName,$facebook,$details){
		$db = Database::getDB();
        $query = "INSERT INTO events (name,
									  artistID,
									  venueID,
									  genreID,
									  startDateTime,
									  endDateTime,
									  cost,
									  ageID,
									  imageFileName,
									  facebookEventLink,
									  details)
				  VALUES ('$name',
				          '$artist',
						  '$venue',
						  '$genre',
						  '$start',
						  '$end',
						  '$price',
						  '$age',
						  '$imageFileName',
						  '$facebook',
						  '$details')";
        $row_count = $db->exec($query);
		return $row_count;
	}
	public function updateEvent($id,$name,$artist,$venue,$genre,$start,$end,$price,$age,$imageFileName,$facebook,$details){
		$db = Database::getDB();
        $query = "UPDATE events
				  SET name = '$name',
				      artistID = '$artist',
					  venueID = '$venue',
					  genreID = '$genre',
					  startDateTime = '$start',
					  endDateTime = '$end',
					  cost = '$price',
					  ageID = '$age',
					  imageFileName = '$imageFileName',
					  facebookEventLink = '$facebook',
					  details = '$details'
				      WHERE eventID = '$id'";		  
        $result = $db->exec($query);
		return $result;
	}
	
	public static function getEvents($filter,$order) {   
        $db = Database::getDB();
        $query = "SELECT * FROM events
				  ORDER BY $filter $order";		  
        $result = $db->query($query);
		$events = array();
		
		foreach ($result as $row){ 
			$event = new Event($row['eventID'],
							   $row['name'],
							   $row['artistID'],
							   $row['venueID'],
							   $row['genreID'],
							   $row['startDateTime'],
							   $row['endDateTime'],
							   $row['cost'],
							   $row['ageID'],
							   $row['imageFileName'],
							   $row['facebookEventLink'],
							   $row['details']
								 );			
			$events[] = $event;
		}
		return $events;
	}
	
	public static function getEventByID($eventID) {
		$db = Database::getDB();
        $query = "SELECT * FROM events
				  WHERE eventID = '$eventID'";		  
        $result = $db->query($query);
		$row = $result->fetch();
		
		$event = new Event($row['eventID'],
							   $row['name'],
							   $row['artistID'],
							   $row['venueID'],
							   $row['genreID'],
							   $row['startDateTime'],
							   $row['endDateTime'],
							   $row['cost'],
							   $row['ageID'],
							   $row['imageFileName'],
							   $row['facebookEventLink'],
							   $row['details']
								 );			
		return $event;
	}
}
?>	