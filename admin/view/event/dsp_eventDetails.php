<h1>Event Details</h1>
<?php 
	$imageFileNameLength = strlen($event->getImageFileName());
	if ($imageFileNameLength > 1){
		echo "<img src='../images/events/" . $event->getImageFileName() . "' class=''/>";
		echo "<br />";
	}
?>
<table name="eventDetails">
	<tr>
		<th>Name:</th>
		<td><?php echo $event->getName();?></td>
	</tr>
	<tr>
		<th>Artist:</th>
		<td><?php echo $event->artist->getName();?></td>
	</tr>
	<tr>
		<th>Start:</th>
		<td><?php echo $event->getStart();?></td>
	</tr>
	<tr>
		<th>End:</th>
		<td><?php echo $event->getEnd();?></td>
	</tr>	
	<tr>
		<th>Venue:</th>
		<td><?php echo $event->venue->getName();?></td>
	</tr>
	<tr>
		<th>Genre:</th>
		<td><?php echo $event->genre->getName();?></td>
	</tr>	
	<tr>
		<th>Age:</th>
		<td><?php echo $event->age->getName();?></td>
	</tr>
	<tr>
		<th>Price:</th>
		<td><?php echo $event->getPrice();?></td>
	</tr>
	<tr>
		<th>Venue:</th>
		<td><?php echo $event->venue->getName();?></td>
	</tr>
<?php 
	$facebookLength = strlen($event->getFacebook());
	if ($facebookLength > 1){
		echo "<tr><th>Facebook Event</th><td>" . $event->getFacebook() . "</td></tr>";
	}
?>	
	<tr>
		<th>Details:</th>
		<td><?php echo $event->getDetails();?></td>
	</tr>	
</table>
<h2><a href="index.php?action=editEvent&eid=<?php echo $event->getID();?>">Edit</a></h2>