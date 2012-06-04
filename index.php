<?php

session_start();

require('model/database.php');
require('model/userDB.php');
require('model/user.php');
require('model/eventDB.php');
require('model/event.php');
require('model/artistDB.php');
require('model/artist.php');
require('model/venueDB.php');
require('model/venue.php');
require('model/genreDB.php');
require('model/genre.php');
require('model/ageDB.php');
require('model/age.php');
require('model/location.php');
require('model/locationDB.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

//begin controller actions

if ($action == 'home'){
	include('view/dsp_header.php');
	include('view/dsp_home.php');
	include('view/dsp_footer.php');
}

else if ($action == 'events'){
	$genres = Genre::getGenres();
	$artists = Artist::getArtists();
	$locations = Location::getLocations();
	$ages = Age::getAges();
	include('view/dsp_header.php');
	include('view/dsp_events.php');
	include('view/dsp_footer.php');	
}

else if ($action == 'eventSearch'){
	$search = $_POST['search'];
	$genre = $_POST['genre'];
	$artist = $_POST['artist'];
	$location = $_POST['location'];
	$age = $_POST['age'];
	
	$events = EventDB::getEventsBySearch($search,$genre,$artist,$location,$age);
	$genres = Genre::getGenres();
	$artists = Artist::getArtists();
	$locations = Location::getLocations();
	$ages = Age::getAges();	
	include('view/dsp_header.php');
	include('view/dsp_events.php');
	include('view/dsp_footer.php');
}

else if ($action == 'eventDetails'){
	include('view/dsp_header.php');
	if(isset($_GET['eid'])){
		$event = eventDB::getEventByID($_GET['eid']);
		include('view/dsp_eventDetails.php');
	}
	else {
		include('view/dsp_events.php');
	}	
	include('view/dsp_footer.php');
}

else if ($action == 'contactUs'){
	include('view/dsp_header.php');
	include('view/dsp_contactUs.php');
	include('view/dsp_footer.php');	
}
?>
