	<h1>Edit Artist</h1>
	<form name="addArtist" method="post" action=".">
		<input type="hidden" name="action" value="updateArtist">
		<input type="hidden" name="artistID" value="<?php echo $artist->getID(); ?>">
		<table>
			<tr>
				<th>Name:</th>
				<td><input type="text" name="name" value="<?php echo $artist->getName(); ?>"></td>
			</tr>
			<tr>
				<th>Genre:</th>
				<td>
				<select name="genre">
					<?php 
						foreach ($genres as $genre){ ?>
							<option <?php if ($genre->getID() == $artist->genre->getID()){echo "selected";} ?> name='genre' value='<?php echo $genre->getID() ?>'> <?php echo $genre->getName();?></option>
						<?php } 																
					?>				
				</select>
				</td>
			</tr>
			<tr>
				<th>Bio:</th>
				<td><textarea name="bio"><?php echo $artist->getBio(); ?></textarea></td>
			</tr>
			<tr>
				<th>Website:</th>
				<td><input type="text" name="websiteLink" value="<?php echo $artist->getWebsiteLink(); ?>"></td>
			</tr>				
		</table>
		<input type="submit" name="submitArtist" value="Save Artist">
	</form>
