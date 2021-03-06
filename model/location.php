<?php 

class Location {

	   public function __construct($locationID,$city,$state,$zip,$country) {
        $this->locationID = $locationID;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
		$this->country = $country;
    }
	   
	   public static function getLocations() {   
        $db = Database::getDB();
        $query = "SELECT * FROM locations
				  ORDER BY city DESC";
        $result = $db->query($query);
		$locations = array();
		
		foreach ($result as $row){ 
			$location = new Location($row['locationID'],
								 $row['city'],
								 $row['state'],
								 $row['zip'],
								 $row['country']);			
			$locations[] = $location;
		}
		return $locations;
}

	static function getLocationByID($id){
		$db = Database::getDB();
		$query = "SELECT * FROM locations WHERE locationID = $id";		  
		$location = $db->query($query);
		$location = $location->fetch();
		
		$locationByID = new Location($location['locationID'],$location['city'],$location['state'],$location['zip'],$location['country']);
		
		return $genreByID;
	}
	
	public function getID(){
		return $this->locationID;
	}	
	
	public function getCity(){
		return $this->city;
	}

	public function getState(){
		return $this->state;
	}	
	
	public function getZip(){
		return $this->zip;
	}
	
	public function getCountry(){
		return $this->country;
	}

}

?>
