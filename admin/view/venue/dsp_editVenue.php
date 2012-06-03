<script type="text/javascript" src="../resources/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="../resources/js/jquery-ui-sliderAccess.js"></script>

<h1>Edit Venue</h1>
<form name="editVenue" method="post" action=".">
<input type="hidden" name="action" value="updateVenue" />
<input type="hidden" name="venueID" value="<?php echo $venue->getID();?>">
<table>
	<tr>
		<th>Name:</th>
		<td><input type="text" name="name" value="<?php echo $venue->getName();?>"/></td>
	</tr>
	<tr>
		<th>Address:</th>
		<td><input type="text" name="address" value="<?php echo $venue->getAddress();?>"/></td>
	</tr>
		<tr>
			<th>Location:</th>
			<td>
			<select name="location">
				<?php 
					foreach ($locations as $location){ ?>
						<option <?php if ($location->getID() == $venue->location->getID()){echo "selected";} ?> name='location' value='<?php echo $location->getID() ?>'> <?php echo $location->getCity() . ", " . $venue->location->getState();?></option>
					<?php } 																
				?>				
			</select>
			</td>
		</tr>
	<tr>
		<th>Description</th>
		<td><textarea name="description"><?php echo $venue->getDescription();?></textarea></td>
	</tr>	
		<th>Website:</th>
		<td><input type="text" name="websiteLink" value="<?php echo $venue->getWebsiteLink();?>"/></td>
	</tr>	
</table>
<input type="submit" value="Save Event" />
</form>

