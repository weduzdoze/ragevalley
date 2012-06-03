<div id="genreForm">
<h1>Add Genre</h1>
<form name="addGenre" method="post" action=".">
	<input type="hidden" name="action" value="saveGenre">
	<table>
		<tr>
			<th>Name:</th>
			<td><input type="text" name="genre"></td>
		</tr>
		<tr>
			<td align="center"><input type="submit" name="submitGenre" value="Add Genre"></td>
		</tr>		
	</table>
</form>
</div>

<div id="genreList">
<h1>Genres</h1>
<table>
	<tr>
		<th>Edit:</th>
		<th>Name:</th>	
		<th>Delete:</th>		
	</tr>
	<?php
	foreach ($genres as $row){
			echo "<tr>";			
			echo "<td><a href='index.php?action=editGenre&gid=" . $row->getID() . "'>Edit</a></td>";
			echo "<td>" . $row->getName() . "</td>";
			echo "<td><a href='index.php?action=deleteRow&table=genres&id=" . $row->getID() . "'>Delete</a></td>";
			echo "</tr>";			
		}
	?>	
</table>
</div>