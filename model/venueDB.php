<?php
class VenueDB {	
	static function getVenueByID($id){
		$db = Database::getDB();
		$query = "SELECT * FROM venues WHERE venueID = $id";		  
		$venue = $db->query($query);
		$venue = $venue->fetch();
		
		$venueByID = new Venue($venue['venueID'],
		                       $venue['locationID'],
							   $venue['name'],
							   $venue['address'],
							   $venue['description'],
							   $venue['websiteLink']);
		return $venueByID;
	}
	
	public static function addVenue($locationID,$name,$address,$description,$websiteLink){
	$db = Database::getDB();
	$query = "INSERT INTO venues (locationID,name,address,description,websiteLink)
			  VALUES ('$locationID','$name','$address','$description','$websiteLink')";
	$venue = $db->exec($query);
	return $venue;
	}
	
	public static function updateVenue($id,$name,$address,$location,$description,$websiteLink){
		$db = Database::getDB();
        $query = "UPDATE venues
				  SET name = '$name',
				      address = '$address',
					  locationID = '$location',
					  description = '$description',
					  websiteLink = '$websiteLink'
				      WHERE venueID = '$id'";		  
        $result = $db->exec($query);
		return $result;
	}
}

?>