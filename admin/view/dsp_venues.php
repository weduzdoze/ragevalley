<div id="venueForm">	
	<h1>Add Venue</h1>
	<form name="addVenue" method="post" action=".">
		<input type="hidden" name="action" value="saveVenue">
		<table>
			<tr>
				<th>Name:</th>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<th>Location:</th>
				<td>
				<select name="location">
					<?php 
						foreach ($locations as $location){
							echo "<option name='location' value='" . $location->getID() . "'>" . $location->getCity() . ", " . $location->getState() . "</option>" ;								
						}
					?>
				</select>
				</td>
			</tr>
			<tr>
				<th>Address:</th>
				<td><input type="text" name="address"></td>
			</tr>
			<tr>
				<th>Description:</th>
				<td><textarea name="description"></textarea></td>
			</tr>
			<tr>
				<th>Website:</th>
				<td><input type="text" name="websiteLink"></td>
			</tr>		
		</table>
		<td align="center"><input type="submit" name="submitVenue" value="Add Venue">
	</form>
</div>

<div id="venueList">
<h1>Venues</h1>
<table>
	<tr>
		<th>Edit:</th>
		<th>Name:</th>		
	</tr>
	<?php
	foreach ($venues as $row){
			echo "<tr>";			
			echo "<td><a href='index.php?action=editVenue&vid=" . $row->getID() . "'>Edit</a></td>";
			echo "<td>" . $row->getName() . "</td>";
			echo "<td><a href='index.php?action=deleteRow&table=venues&id=" . $row->getID() . "'>Delete</a></td>";
			echo "</tr>";			
		}
	?>	
</table>
</div>