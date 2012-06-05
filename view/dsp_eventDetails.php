<div id="eventDetails">

<div id="eventDetailsEventName"><?php echo $event->getName();?>!</div><br/>
<div id="eventDetailsFeaturing"><i>Featuring:</i></div><br/>
<div id="eventDetailsArtistName"><?php echo $event->artist->getName();?></div>
<br />
<div id="eventDetailsImage">
<?php 
	$imageFileNameLength = strlen($event->getImageFileName());
	if ($imageFileNameLength > 1){
		echo "<img src='images/events/" . $event->getImageFileName() . "' class='image'>";
		echo "<br />";
	}
?>
</div>

<div id="eventDetailsArtist"><br/>
		<span id="eventName"><b>Name: </b><?php echo $event->getName();?></span><br />
		<span id="eventArtist"><b>Artist: </b><?php echo $event->artist->getName();?></span><br />	
		<span id="eventStart"><b>Start: </b><?php echo $event->getStart();?></span><br />
		<span id="eventEnd"><b>End: </b><?php echo $event->getEnd();?></span><br />
		<span id="eventVenue"><b>Venue: </b><?php echo $event->venue->getName();?></span><br />
		<span id="eventGenre"><b>Genre: </b><?php echo $event->genre->getName();?></span><br />
		<span id="eventAge"><b>Age: </b><?php echo $event->age->getName();?></span><br />
		<span id="eventPrice"><b>Price: </b><?php echo $event->getPrice();?></span><br />
		<?php 
		$facebookLength = strlen($event->getFacebook());
		if ($facebookLength > 1){ ?>
			<span id="eventFacebook"><b>Facebook:</b> <?php echo $event->getFacebook();?></span><br />
		<?php } ?>		
		<span id="eventDetails"><b>Details:</b> <?php echo $event->getDetails();?></span><br />
		
</div>



<br/><br/><br/><br/>
<div>