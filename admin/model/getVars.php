<?php 
	//create associative array 'Tables' for universal delete method in the userDB class. 
	//This array matches the table name (supplied as an argurment) with the name of the column
	//in the given table that contains the primary key/unique identifier
	$tables = array();
	$tables['artists'] = 'artistID'; 
	$tables['genres'] = 'genreID';
	$tables['venues'] = 'venueID';
	$tables['locations'] = 'locationID';
	$tables['ages'] = 'ageID';	
	$tables['users'] = 'userID';
?>