<?php

session_start();
//function for loading the manage navigation bar
function loadManage(){
	$locations = Location::getLocations();
	$artists = Artist::getArtists();
    $venues = Venue::getVenues();
	$genres = Genre::getGenres();
	$ages = Age::getAges();
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	include('view/dsp_manage.php');
	include('view/dsp_footer.php');
}
//require all classes
require('../model/database.php');
require('../model/userDB.php');
require('../model/user.php');
require('../model/eventDB.php');
require('../model/event.php');
require('../model/artistDB.php');
require('../model/artist.php');
require('../model/venueDB.php');
require('../model/venue.php');
require('../model/genreDB.php');
require('../model/genre.php');
require('../model/ageDB.php');
require('../model/age.php');
require('../model/location.php');
require('../model/locationDB.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login';
}
//display login page
if ($action == 'login') {
	include('view/dsp_header.php');
	include('view/user/dsp_login.php');
	include('view/dsp_footer.php');
}
//logout function. end session, display login page
else if ($action == 'logout') {
	session_unset();
	session_destroy();
	include('view/dsp_header.php');
	include('view/user/dsp_login.php');
	include('view/dsp_footer.php');
}
//process the login
else if ($action == 'loginProcess'){
	$username = $_POST['username']; 
	$password = $_POST['password']; 

	try {
		$user = userDB::login($username,$password);
	} catch (Exception $e){
		$error = $e->getMessage();
	}
	if (isset($user)){
		header('Location: index.php?action=events');
	}
	else{
		include('view/dsp_header.php');
		include('view/user/dsp_login.php');
		include('view/dsp_footer.php');
	}	
	
}
	
else if ($action == 'addUser'){
	include('view/dsp_header.php');
	include('view/user/dsp_register.php');
	include('view/dsp_footer.php');
}	

else if ($action == 'saveUser'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirmPass'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	
	try {
		$user = userDB::addUser($username,$password,$firstname,$lastname,$email);
	} catch (Exception $e){
		$error = $e->getMessage();
	}
	
	if (isset($user)){
		$user = userDB::login($username,$password);
		header('Location: index.php?action=events');		
	}
	else{
		include('view/dsp_header.php');
		include('view/user/dsp_register.php');
		include('view/dsp_footer.php');	
	}
}

else if ($action == 'deleteRow'){
	$table = $_GET['table'];
	$id = $_GET['id'];
	include('../model/getVars.php');
	foreach($tables as $key=>$value) 
    { 
		if ($key == $table)
			$delete = Database::delete($table,$value,$id); 
			header('Location: index.php?action='. $table);
    }
}

else if ($action == 'events'){
	$events = EventDB::getEvents('name','DESC');
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	include('view/event/dsp_events.php');
	include('view/dsp_footer.php');
}

else if ($action == 'eventDetails'){
	include('view/dsp_header.php');
	if (isset($_GET['eid'])){
		$event = EventDB::getEventByID($_GET['eid']);
		include('view/event/dsp_eventDetails.php');
	}
	else {
		include('view/event/dsp_events.php');
	}
	include('view/dsp_footer.php');
}

else if ($action == 'addEvent'){
	$artists = Artist::getArtists();
    $venues = Venue::getVenues();
	$genres = Genre::getGenres();
	$ages = Age::getAges();
	include('view/dsp_header.php');
	include('view/event/dsp_addEvent.php');
	include('view/dsp_footer.php');
}

else if ($action == 'saveEvent') {
	$name = $_POST['name'];
	$artist = $_POST['artist'];
	$venue = $_POST['venue'];
	$genre = $_POST['genre'];
	$start = $_POST['start'];
	$end = $_POST['end'];	
	$price = $_POST['price'];
	$age = $_POST['age'];
	$imageFileName = $_POST['imageFileName'];
	$facebook = $_POST['facebook'];
	$details = $_POST['details'];
	
	//example of server side validation
	if (preg_match('^(?:[1-9]\d+|\d)(?:\.\d\d)?$^', $price)) {
		//strip dollar sign before database insert
		$price = preg_replace('/[\$,]/', '', $price);
		//try to add the event
		try{
			$event = eventDB::addEvent($name,$artist,$venue,$genre,$start,$end,$price,$age,$imageFileName,$facebook,$details);
		//if there is an error, display the message, and reload the add_event page
		} catch (Exception $e){
			$error = $e->getMessage();
			include('view/dsp_header.php');
			include('view/event/dsp_addEvent.php');
			include('view/dsp_footer.php');
		}
		//if the event added successfully, then event will be defined
		//display the confirmation message (supplied as error to display in the universal message placeholder)
		if (isset($event)){
			$error = 'Event added!';
			$events = EventDB::getEvents('name','DESC'); 
			include('view/dsp_header.php');
			include('view/event/dsp_events.php');
			include('view/dsp_footer.php');			
		}
		//if the price value does not pass the regular expression validation
		//display an error message, and redisplay the add event form
	} else {
		$error = "Error with the price value: " . $price;
		$artists = Artist::getArtists();
		$venues = Venue::getVenues();
		$genres = Genre::getGenres();
		$ages = Age::getAges();
		include('view/dsp_header.php');
		include('view/event/dsp_addEvent.php');
		include('view/dsp_footer.php');
	}	
}

else if ($action == 'editEvent'){
	$artists = Artist::getArtists();
    $venues = Venue::getVenues();
	$genres = Genre::getGenres();
	$ages = Age::getAges();
    include('view/dsp_header.php');
	if (isset($_GET['eid'])){
		$event = EventDB::getEventByID($_GET['eid']);
		include('view/event/dsp_editEvent.php');
	}
	else {
		include('view/event/dsp_events.php');
	}
	include('view/dsp_footer.php');
}

else if ($action == 'updateEvent'){
	$id = $_POST['eventID'];
	$name = $_POST['name'];
	$artist = $_POST['artist'];
	$venue = $_POST['venue'];
	$genre = $_POST['genre'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$price = $_POST['price'];
	$age = $_POST['age'];
	$imageFileName = $_POST['imageFileName'];
	$facebook = $_POST['facebook'];
	$details = $_POST['details'];

	$event = eventDB::updateEvent($id,$name,$artist,$venue,$genre,$start,$end,$price,$age,$imageFileName,$facebook,$details);	
	if ($event == 1){
		header('Location: index.php?action=eventDetails&eid=' . $id);
	}
	else {
		echo 'Error.';
	}
}

else if ($action == 'manage'){
	loadManage();
	
}

else if ($action == 'genres'){
	$genres = Genre::getGenres();
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	include('view/genre/dsp_genres.php');
	include('view/dsp_footer.php');
}

else if ($action == 'saveGenre'){
	$genre = $_POST['genre'];	
	$genreAdded = genreDB::addGenre($genre);
	if ($genreAdded == 1){
		header('Location: index.php?action=genres');		
	}
	else {
		echo 'Error!';
	}
}

else if ($action == 'editGenre'){
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	if (isset($_GET['gid'])){
		$genre = GenreDB::getGenreByID($_GET['gid']);
		include('view/genre/dsp_editGenre.php');
	}
	else {
		header('Location: index.php?action=genres');
	}
	include('view/dsp_footer.php');		
}
	
else if ($action == 'updateGenre'){
	$id = $_POST['genreID'];
	$name = $_POST['name'];	
	
	$genre = GenreDB::updateGenre($id,$name);	
	if ($genre == 1){
		header('Location: index.php?action=genres');
	}
	else {
		echo 'Error.';
	}	
}	
else if ($action == 'artists'){
	$genres = Genre::getGenres();
	$artists = Artist::getArtists();
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	include('view/artist/dsp_artists.php');
	include('view/dsp_footer.php');
}	

else if ($action == 'saveArtist'){
	$name = $_POST['name'];
	$genreID = $_POST['genreID'];
	$bio = $_POST['bio'];
	$websiteLink = $_POST['websiteLink'];
	$artistAdded = artistDB::addArtist($name,$genreID,$bio,$websiteLink);
	header('Location: index.php?action=artists');
}

else if ($action == 'editArtist'){
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	if (isset($_GET['aid'])){
		$genres = Genre::getGenres();
		$artist = ArtistDB::getArtistByID($_GET['aid']);
		include('view/artist/dsp_editArtist.php');
	}
	else {
		include('view/artist/dsp_artists.php');
	}
	include('view/dsp_footer.php');		
}

else if ($action == 'updateArtist'){
	$id = $_POST['artistID'];
	$name = $_POST['name'];
	$genreID = $_POST['artistID'];
	$bio = $_POST['bio'];
	$websiteLink = $_POST['websiteLink'];
	
	$artist = artistDB::updateArtist($id,$name,$genreID,$bio,$websiteLink);
	if ($artist == 1){
		header('Location: index.php?action=artists');
	}
	else {
		echo 'Error.';
	}
}

else if ($action == 'venues'){
	$venues = Venue::getVenues();
	$locations = Location::getLocations();
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	include('view/venue/dsp_venues.php');
	include('view/dsp_footer.php');
}

else if ($action == 'saveVenue'){
	$locationID = $_POST['locationID'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$description = $_POST['description'];
	$websiteLink = $_POST['websiteLink'];
	$venueAdded = venueDB::addVenue($locationID,$name,$address,$description,$websiteLink);
	header('Location: index.php?action=venues');
}	

else if ($action == 'editVenue'){
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	if (isset($_GET['vid'])){
		$locations = Location::getLocations();
		$venue = VenueDB::getVenueByID($_GET['vid']);
		include('view/venue/dsp_editVenue.php');
	}
	else {
		include('view/venue/dsp_venues.php');
	}
	include('view/dsp_footer.php');	
}

else if ($action == 'updateVenue'){
	$id = $_POST['venueID'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$location = $_POST['location'];
	$description = $_POST['description'];
	$websiteLink = $_POST['websiteLink'];
	
	$venue = venueDB::updateVenue($id,$name,$address,$location,$description,$websiteLink);	
	if ($venue == 1){
		header('Location: index.php?action=venues');
	}
	else {
		echo 'Error.';
	}	
}

else if ($action == 'ages'){
	$ages = Age::getAges();
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	include('view/age/dsp_ages.php');
	include('view/dsp_footer.php');
}

else if ($action == 'saveAge'){
	$age = $_POST['age'];	
	$ageAdded = ageDB::addAge($age);
	header('Location: index.php?action=ages');
}	

else if ($action == 'editAge'){
	$aid = $_GET['aid'];
	$age = AgeDB::getAgeByID($aid);
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	include('view/age/dsp_editAge.php');
	include('view/dsp_footer.php');
}

else if ($action == 'updateAge'){
	$id = $_POST['ageID'];
	$name = $_POST['name'];	
	
	$age = AgeDB::updateAge($id,$name);	
	if ($age == 1){
		header('Location: index.php?action=ages');
	}
	else {
		echo 'Error.';
	}
}
else if ($action == 'locations'){
	$locations = Location::getLocations();
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	include('view/location/dsp_locations.php');
	include('view/dsp_footer.php');
}

else if ($action == 'saveLocation'){
	$city = $_POST['city'];	
	$state = $_POST['state'];	
	$zip = $_POST['zip'];	
	$country = $_POST['country'];	
	$locationAdded = locationDB::addLocation($city,$state,$zip,$country);
	header('Location: index.php?action=locations');
}

else if ($action == 'editLocation'){
	$lid = $_GET['lid'];
	$location = LocationDB::getLocationByID($lid);
	include('view/dsp_header.php');
	include('view/dsp_manageNav.php');
	include('view/location/dsp_editLocation.php');
	include('view/dsp_footer.php');
}

else if ($action == 'updateLocation'){
	$id = $_POST['locationID'];
	$city = $_POST['city'];
	$state = $_POST['state'];	
	$zip = $_POST['zip'];
	$country = $_POST['country'];
	
	$location = LocationDB::updateLocation($id,$city,$state,$zip,$country);	
	if ($location == 1){
		header('Location: index.php?action=locations');
	}
	else {
		echo 'Error.';
	}
}

else if ($action == 'users'){	
	$users = User::getUsers();
	include('view/dsp_header.php');
	include('view/user/dsp_accounts.php');
	include('view/dsp_footer.php');	
}



?>