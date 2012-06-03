<?php 

class Artist{
	   public function __construct($artistID,$name,$genreID,$bio,$websiteLink) {
        $this->artistID = $artistID;
        $this->name = $name;
        $this->genre = GenreDB::getGenreByID($genreID);
        $this->bio = $bio;
		$this->websiteLink = $websiteLink;
    }
	   
	   public static function getArtists() {   
        $db = Database::getDB();
        $query = "SELECT * FROM artists
				  ORDER BY name DESC";
        $result = $db->query($query);
		$artists = array();
		
		foreach ($result as $row){ 
			$artist = new Artist($row['artistID'],
								 $row['name'],
								 $row['genreID'],
								 $row['bio'],
								 $row['websiteLink']);			
			$artists[] = $artist;
		}
		return $artists;
}
	
	public function getID(){
		return $this->artistID;
	}		
	public function getName(){
		return $this->name;
	}
	
	public function getBio(){
		return $this->bio;
	}
	public function getWebsiteLink(){
		return $this->websiteLink;
	}
	

}

?>