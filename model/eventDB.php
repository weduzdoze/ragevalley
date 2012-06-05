<?php 
class eventDB {   
	
	public static function addEvent($name,$artist,$venue,$genre,$start,$end,$price,$age,$imageFileName,$facebook,$details){
		$db = Database::getDB();
        //define query to insert new event
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
		//execute the query
		$row_count = $db->exec($query);
		//on succesful insert, $row_count with be assigned a value of True(1)
		//if NOT true (false) throw an exception
		if (!$row_count){
			throw new Exception("Error adding event.");
		}
		//if the event added successfully, return true
		else{
			return $row_count;
		}		
	}
	public static function updateEvent($id,$name,$artist,$venue,$genre,$start,$end,$price,$age,$imageFileName,$facebook,$details){
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
	//method to get Events
	//accepts two optional parameters, filter and order, to allow different sorting methods
	//filter has a default parameter of 'name' (the column in the db)
	//order has a default parameter of 'desc' to sort the recordset from big to small
	public static function getEvents($filter = 'name',$order = 'desc') {   
        $db = Database::getDB();
        $query = "SELECT * FROM events
				  ORDER BY $filter $order";		  
        $result = $db->query($query);
		//create an empty array
		$events = array();
		//loop through each row returned by the query
		foreach ($result as $row){ 
			//make a new event object for each event returned by the query
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
			//append each new event object to the events array
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
	
	public static function getEventsBySearch($search,$genre,$artist,$location,$age){
		$db = Database::getDB();
        //join the relevant tables
		$query = "SELECT e.*,v.venueID FROM events e
				  LEFT JOIN venues v ON e.venueID = v.venueID
				  LEFT JOIN locations l ON v.locationID = l.locationID"; 
		         //append where clauses to the search query if the user supplies a search parameter for that column
				 if (strlen($search) > 0){ $query .= " WHERE e.name LIKE '%$search%'"; } 
				 if ($genre != 0){ $query .= "AND genreID = '$genre'";}
				 if ($artist != 0){ $query .= "AND artistID = '$artist'";}
				 if ($location != 0){ $query .= "AND l.locationID = '$location'";}
				 if ($age != 0){ $query .= "AND ageID = '$age'";} 		  
		$result = $db->query($query);
		//create an empty array to store event objects for all events returned in the search
		$events = array();
		//loop through each row returned from the search query
		foreach ($result as $row){ 
			//create a new Event object
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
			//append the event object to the end of the events array
			$events[] = $event;
		}
		//return the array of event objectss
		return $events;	
	}
}
?>	