<?php 
class Genre{
	   public function __construct($genreID,$name) {
        $this->genreID = $genreID;
        $this->name = $name;
    }
	   
	   public static function getGenres() {   
        $db = Database::getDB();
        $query = "SELECT * FROM genres
				  ORDER BY name DESC";
        $result = $db->query($query);
		$genres = array();
		
		foreach ($result as $row){ 
			$genre = new Genre($row['genreID'],
								 $row['name']);			
			$genres[] = $genre;
		}
		return $genres;
}
	
	public function getID(){
		return $this->genreID;
	}	
	
	public function getName(){
		return $this->name;
	}
	

}

?>