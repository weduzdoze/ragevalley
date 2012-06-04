<h1>Event Details</h1>
<h2><a href="index.php?action=editEvent&eid=<?php echo $event->getID();?>">Edit</a></h2>
<?php 
	$imageFileNameLength = strlen($event->getImageFileName());
	if ($imageFileNameLength > 1){
		echo "<img src='../images/events/" . $event->getImageFileName() . "' class=''/>";
		echo "<br /><br />";
	}
?>

		<span id="eventName">Name: <?php echo $event->getName();?></span><br />
		<span id="eventArtist">Artist: <?php echo $event->artist->getName();?></span><br />	
		<span id="eventStart">Start: <?php echo $event->getStart();?></span><br />
		<span id="eventEnd">End: <?php echo $event->getEnd();?></span><br />
		<span id="eventVenue">Venue: <?php echo $event->venue->getName();?></span><br />
		<span id="eventGenre">Genre: <?php echo $event->genre->getName();?></span><br />
		<span id="eventAge">Age: <?php echo $event->age->getName();?></span><br />
		<span id="eventPrice">Price: <?php echo $event->getPrice();?></span><br />
		<?php 
		$facebookLength = strlen($event->getFacebook());
		if ($facebookLength > 1){ ?>
			<span id="eventFacebook">Facebook: <?php echo $event->getFacebook();?></span><br />
		<?php } ?>		
		<span id="eventDetails">Details: <?php echo $event->getDetails();?></span><br />

		