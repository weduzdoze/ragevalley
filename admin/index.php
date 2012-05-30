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

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login';
}

if ($action == 'login') {
	include('view/dsp_header.php');
	include('view/dsp_login.php');
	include('view/dsp_footer.php');
}

else if ($action == 'logout') {
	session_unset();
	session_destroy();
	include('view/dsp_header.php');
	include('view/dsp_login.php');
	include('view/dsp_footer.php');
}

else if ($action == 'loginProcess'){
	$username = $_POST['username']; 
	$password = $_POST['password']; 
	$user = userDB::login($username,$password);
	include('view/dsp_header.php');
	include('view/dsp_home.php');
	include('view/dsp_footer.php');
	
}
	
else if ($action == 'addUser'){
	include('view/dsp_header.php');
	include('view/dsp_register.php');
	include('view/dsp_footer.php');
}	

else if ($action == 'saveUser'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$user = userDB::addUser($username,$password,$firstname,$lastname,$email);
	if ($user == 1){
		echo 'User added!';
	}
	else {
		echo 'Error!';
	}
}

else if ($action == 'viewEvents'){
	$events = EventDB::getEvents('name','DESC');
	include('view/dsp_header.php');
	include('view/dsp_eventList.php');
	include('view/dsp_footer.php');
}

else if ($action == 'eventDetails'){
	include('view/dsp_header.php');
	if (isset($_GET['eid'])){
		$event = EventDB::getEventByID($_GET['eid']);
		include('view/dsp_eventDetails.php');
	}
	else {
		include('view/dsp_eventList.php');
	}
	include('view/dsp_footer.php');
}

else if ($action == 'addEvent'){
	$artists = Artist::getArtists();
    $venues = Venue::getVenues();
	$genres = Genre::getGenres();
	$ages = Age::getAges();
	include('view/dsp_header.php');
	include('view/dsp_addEvent.php');
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
	
	$event = eventDB::addEvent($name,$artist,$venue,$genre,$start,$end,$price,$age,$imageFileName,$facebook,$details);
	if ($event == 1){
		echo 'Event added!';
		include('view/dsp_header.php');
		include('view/dsp_events.php');
		include('view/dsp_footer.php');
	}
	else {
		echo 'Error!';
	}
}

else if ($action == 'manage'){
	include('view/dsp_header.php');
	include('view/dsp_manage.php');
	include('view/dsp_footer.php');
}
	
?>