<?php

class GenreDB {
	
	static function getGenreByID($id){
		$db = Database::getDB();
		$query = "SELECT * FROM genres WHERE genreID = $id";		  
		$genre = $db->query($query);
		$genre = $genre->fetch();
		
		$genreByID = new Genre($genre['genreID'],$genre['name']);
		
		return $genreByID;
	}
	
	public static function addGenre($genre){
	$db = Database::getDB();
	$query = "INSERT INTO genres (name)
			  VALUES ('$genre')";
	$genre = $db->exec($query);
	return $genre;
	}
}

?>