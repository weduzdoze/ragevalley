<?php

session_start();

require('admin/model/database.php');
require('admin/model/userDB.php');
require('admin/model/user.php');
require('admin/model/eventDB.php');
require('admin/model/event.php');
require('admin/model/artistDB.php');
require('admin/model/artist.php');
require('admin/model/venueDB.php');
require('admin/model/venue.php');
require('admin/model/genreDB.php');
require('admin/model/genre.php');
require('admin/model/ageDB.php');
require('admin/model/age.php');
require('admin/model/location.php');
require('admin/model/locationDB.php');

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
	include('view/dsp_header.php');
	include('view/dsp_events.php');
	include('view/dsp_footer.php');	
}
?>