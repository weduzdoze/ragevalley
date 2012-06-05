<?php 

class Event{
	   //constructor for event object
	   public function __construct($id,$name,$artistID,$venueID,$genreID,$start,$end,$price,$ageID,$imageFileName,$facebook,$details) {		
		$this->id = $id;
		$this->name = $name;		
		//the artist property is an artist object
		$this->artist = ArtistDB::getArtistByID($artistID);
        //the venue property is a venue object
		$this->venue = VenueDB::getVenueByID($venueID);
        //the genre property is a genre object
		$this->genre = GenreDB::getGenreByID($genreID);
		$this->start = $start;
		$this->end = $end;
		$this->price = $price;
		//the age property is an age object
		$this->age = AgeDB::getAgeByID($ageID);
		$this->imageFileName = $imageFileName;
		$this->facebook = $facebook;
		$this->details = $details;
    }
	   
	
	public function getID(){
		return $this->id;
	}		
	public function getName(){
		return $this->name;
	}
	public function getArtist(){
		return $this->artist;
	}
	public function getVenue(){
		return $this->venue;
	}
	public function getGenre(){
		return $this->genre;
	}
	public function getStart(){
		return $this->start;
	}
	public function getEnd(){
		return $this->end;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getAge(){
		return $this->age;
	}		
	public function getImageFileName(){
		return $this->imageFileName;
	}	
	public function getFacebook(){
		return $this->facebook;
	}	
	public function getDetails(){
		return $this->details;
	}

}

?>