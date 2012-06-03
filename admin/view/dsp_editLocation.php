<form name="addLocation" method="post" action=".">
	<input type="hidden" name="locationID" value="<?php echo $location->getID();?>">
	<input type="hidden" name="action" value="updateLocation">
	<table>
		<tr>
			<th>City:</th>
			<td><input type="text" name="city" value="<?php echo $location->getCity(); ?>"></td>
		</tr>
		<tr>
			<th>State:</th>
			<td><input type="text" name="state" value="<?php echo $location->getState(); ?>"></td>
		</tr>
		<tr>
			<th>Zip:</th>
			<td><input type="text" name="zip" value="<?php echo $location->getZip(); ?>"></td>
		</tr>
		<tr>
			<th>Country:</th>
			<td><input type="text" name="country" value="<?php echo $location->getCountry(); ?>"></td>
		</tr>		
	</table>
	<input type="submit" name="submitLocation" value="Save Location">
</form>