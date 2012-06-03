<div id="locationForm">	
	<h1>Add Location</h1>
	<form name="addLocation" method="post" action=".">
		<input type="hidden" name="action" value="saveLocation">
		<table>
			<tr>
				<th>City:</th>
				<td><input type="text" name="city"></td>
			</tr>
			<tr>
				<th>State:</th>
				<td><input type="text" name="state"></td>
			</tr>
			<tr>
				<th>Zip:</th>
				<td><input type="text" name="zip"></td>
			</tr>
			<tr>
				<th>Country:</th>
				<td><input type="text" name="country"></td>
			</tr>		
			<tr>
				<td align="center"><input type="submit" name="submitLocation" value="Add Location"></td>
			</tr>
		</table>
	</form>
</div>

<div id="locationList">
<h1>Locations</h1>
<table>
	<tr>
		<th>Edit:</th>
		<th>Name:</th>	
		<th>Delete:</th>		
	</tr>
	<?php
	foreach ($locations as $row){
			echo "<tr>";			
			echo "<td><a href='index.php?action=editLocation&gid=" . $row->getID() . "'>Edit</a></td>";
			echo "<td>" . $row->getCity() . ", " . $row->getState() . "</td>";
			echo "<td><a href='index.php?action=deleteRow&table=locations&id=" . $row->getID() . "'>Delete</a></td>";
			echo "</tr>";			
		}
	?>	
</table>
</div>