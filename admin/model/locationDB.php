<?php
class LocationDB {	
	static function getLocationByID($id){
		$db = Database::getDB();
		$query = "SELECT * FROM locations WHERE locationID = $id";		  
		$result = $db->query($query);
		$location = $result->fetch();
		
		$locationByID = new Location($location['locationID'],
									 $location['city'],
									 $location['state'],
									 $location['zip'],
									 $location['country']);
		
		return $locationByID;
	}
	public static function addLocation($city,$state,$zip,$country){
	$db = Database::getDB();
	$query = "INSERT INTO locations (city,state,zip,country)
			  VALUES ('$city','$state','$zip','$country')";
	$location = $db->exec($query);
	return $location;
	}	
}

?>