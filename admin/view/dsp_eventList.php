<a href="index.php?action=addEvent" >Add New Event</a>
<h1>Events</h1>

<table name="listEvents" cellspacing="1" cellpadding="1">
	<tr>
		<th>Name</th>
		<th>Artist</th>
		<th>Venue</th>
	</tr>
		
	<?php 
		foreach ($events as $row){
			echo "<tr>";
			echo "<td><a href='index.php?action=eventDetails&eid=" . $row->getID() . "'>View</a></td>";
			echo "<td>" . $row->getName() . "</td>";
			echo "<td>" . $row->artist->getName() . "</td>";
			echo "<td>" . $row->venue->getName() . "</td>";
			echo "</tr>";			
		}
	?>
</table>


