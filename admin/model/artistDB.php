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
	public static function addArtist($name,$genreID,$bio,$websiteLink){
	$db = Database::getDB();
	$query = "INSERT INTO artists (name,genreID,bio,websiteLink)
			  VALUES ('$name','$genreID','$bio','$websiteLink')";
	$artist = $db->exec($query);
	return $artist;
	}	
	
	public static function updateArtist($id,$name,$genreID,$bio,$websiteLink){
			var_dump(func_get_args());
	exit();
		$db = Database::getDB();
        $query = "UPDATE artists
				  SET name = '$name',
				      genreID = '$genreID',
					  bio = '$bio',
					  websiteLink = '$websiteLink'
				      WHERE artistID = '$id'";		  
        $result = $db->exec($query);
		return $result;
	}	
}

?>