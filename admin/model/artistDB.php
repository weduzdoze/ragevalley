<?php

class ArtistDB {
	
	static function getArtistByID($id){
		$db = Database::getDB();
		$query = "SELECT * FROM artists WHERE artistID = $id";		  
		$artist = $db->query($query);
		$artist = $artist->fetch();
		
		$artistByID = new Artist($artist['artistID'],$artist['name'],$artist['genreID'],$artist['bio'],$artist['websiteLink']);
		
		return $artistByID;
	}
}

?>