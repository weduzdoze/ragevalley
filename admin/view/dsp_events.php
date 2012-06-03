<a href="index.php?action=addEvent" >Add New Event</a>
<h1>Events</h1>

<table name="listEvents" cellspacing="1" cellpadding="1">
	<tr>
		<th>View</th>
		<th>Name</th>
		<th>Artist</th>
		<th>Date</th>
		<th>Venue</th>
		<th>Delete</th>
	</tr>
		
	<?php 
			
		foreach ($events as $row){
			$date = new DateTime($row->getStart());
			echo "<tr>";
			echo "<td><a href='index.php?action=eventDetails&eid=" . $row->getID() . "'>View</a></td>";
			echo "<td>" . $row->getName() . "</td>";
			echo "<td>" . $row->artist->getName() . "</td>";
			echo "<td>" . $date->format('m/d/y') . "</td>";
			echo "<td>" . $row->venue->getName() . "</td>";
			echo "<td><a href='index.php?action=deleteRow&table=events&id=" . $row->getID() . "'>Delete</a></td>";
			echo "</tr>";			
		}
	?>
</table>


