<?php 

class Venue{
	   public function __construct($venueID,$locationID,$name,$address,$websiteLink) {
        $this->venueID = $venueID;
        $this->locationID = $locationID;
        $this->name = $name;
        $this->address = $address;
		$this->websiteLink = $websiteLink;
    }
	   
	   public static function getVenues() {   
        $db = Database::getDB();
        $query = "SELECT * FROM venues
				  ORDER BY name DESC";
        $result = $db->query($query);
		$venues = array();
		
		foreach ($result as $row){ 
			$venue = new Venue($row['venueID'],
								 $row['locationID'],
								 $row['name'],
								 $row['address'],
								 $row['websiteLink']);			
			$venues[] = $venue;
		}
		return $venues;
}
	
	public function getID(){
		return $this->venueID;
	}	
	
	public function getName(){
		return $this->name;
	}
	

}

?>