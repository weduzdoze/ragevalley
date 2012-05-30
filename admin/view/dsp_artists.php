<div id="artistForm">	
	<h1>Add Artist</h1>
	<form name="addArtist" method="post" action=".">
		<input type="hidden" name="action" value="saveArtist">
		<table>
			<tr>
				<th>Name:</th>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<th>Genre:</th>
				<td>
				<select name="genre">
					<?php 
						foreach ($genres as $genre){
							echo "<option name='genre' value='" . $genre->getID() . "'>" . $genre->getName() . "</option>" ;								
						}
					?>
				</select>
				</td>
			</tr>
			<tr>
				<th>Bio:</th>
				<td><textarea name="bio"></textarea></td>
			</tr>
			<tr>
				<th>Website:</th>
				<td><input type="text" name="websiteLink"></td>
			</tr>
			<tr>
				<td align="center"><input type="submit" name="submitArtist" value="Add Artist"></td>
			</tr>
		</table>
	</form>
</div>
<div id="artistList">
<h1>Artists</h1>
<table>
	<tr>
		<th>Edit:</th>
		<th>Name:</th>
		<th>Delete:</th>
	</tr>
	<?php
	foreach ($artists as $row){
			echo "<tr>";			
			echo "<td><a href='index.php?action=editArtist&aid=" . $row->getID() . "'>Edit</a></td>";
			echo "<td>" . $row->getName() . "</td>";
			echo "<td><a href='index.php?action=deleteRow&table=artists&id=" . $row->getID() . "'>Delete</a></td>";
			echo "</tr>";			
		}
	?>	
</table>
</div>

