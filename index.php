<?php
//start the session
session_start();
//load class definitions
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
//find the action, and set it to $action
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

//begin controller actions
//prepare data in model, include the view
if ($action == 'home'){
	$artists = Artist::getArtists();
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
//assign search parameters to variables
else if ($action == 'eventSearch'){
	$search = $_POST['search'];
	$genre = $_POST['genre'];
	$artist = $_POST['artist'];
	$location = $_POST['location'];
	$age = $_POST['age'];
	//call the getEventsBySearch method of the EventDB class
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
	//event details page requires the eventID passed in as a url variable
	//if the url variable eid exists
	if(isset($_GET['eid'])){
		//create a new event object for the event containing the given eventID
		$event = eventDB::getEventByID($_GET['eid']);
		//include the event details page, which loads the information about the specific event
		include('view/dsp_eventDetails.php');
	}
	//if no eventID is given, just load the events page
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

else if ($action == 'aboutUs'){
	include('view/dsp_header.php');
	include('view/dsp_aboutUs.php');
	include('view/dsp_footer.php');		
}
?>
