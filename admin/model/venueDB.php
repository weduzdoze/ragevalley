<?php

class VenueDB {
	
	static function getVenueByID($id){
		$db = Database::getDB();
		$query = "SELECT * FROM venues WHERE venueID = $id";		  
		$venue = $db->query($query);
		$venue = $venue->fetch();
		
		$venueByID = new Venue($venue['venueID'],$venue['locationID'],$venue['name'],$venue['address'],$venue['description'],$venue['websiteLink']);
		
		return $venueByID;
	}
}

?>