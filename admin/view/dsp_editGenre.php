<form name="addGenre" method="post" action=".">
	<input type="hidden" name="action" value="updateGenre">
	<input type="hidden" name="genreID" value="<?php echo $genre->getID(); ?>">
	<table>
		<tr>
			<th>Name:</th>
			<td><input type="text" name="name" value="<?php echo $genre->getName(); ?>"></td>
		</tr>			
	</table>
	<td align="center"><input type="submit" name="submitGenre" value="Save Genre">
</form>