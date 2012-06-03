<script type="text/javascript" src="../resources/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="../resources/js/jquery-ui-sliderAccess.js"></script>

<h1>Edit Event</h1>
<form name="addEvent" method="post" action=".">
<input type="hidden" name="action" value="updateEvent" />
<input type="hidden" name="eventID" value="<?php echo $event->getID();?>">
<table>
	<tr>
		<th>Name:</th>
		<td><input type="text" name="name" value="<?php echo $event->getName();?>"/></td>
	</tr>
	<tr>
		<th>Artist:</th>
		<td>
			<select name="artist">
				<?php 
					foreach ($artists as $artist){ ?>
						<option <?php if ($artist->getID() == $event->artist->getID()){echo "selected";} ?> name='artist' value='<?php echo $artist->getID() ?>'> <?php echo $artist->getName();?></option>
					<?php } 																
				?>
			</select>
		</td>
	</tr>
	<tr>
		<th>Venue:</th>
		<td>
			<select name="venue">
				<?php 
					foreach ($venues as $venue){ ?>
						<option <?php if ($venue->getID() == $event->venue->getID()){echo "selected";} ?> name='venue' value='<?php echo $venue->getID() ?>'> <?php echo $venue->getName();?></option>
					<?php } 																
				?>				
			</select>
		</td>
	</tr>
	<tr>
		<th>Genre:</th>
		<td>
			<select name="genre">
				<?php 
					foreach ($genres as $genre){ ?>
						<option <?php if ($genre->getID() == $event->genre->getID()){echo "selected";} ?> name='genre' value='<?php echo $genre->getID() ?>'> <?php echo $genre->getName();?></option>
					<?php } 																
				?>				
			</select>			
		</td>
	</tr>		
	<tr>
		<th>Start:</th>
		<td><input type="date" name="start" class="datetime" value="<?php echo $event->getStart();?>"/></td>
	</tr>
	<tr>
		<th>End:</th>
		<td><input type="date" name="end" class="datetime" value="<?php echo $event->getEnd();?>"/></td>
	</tr>
	<tr>
		<th>Price:</th>
		<td><input type="number" name="price" value="<?php echo $event->getPrice();?>"/></td>
	</tr>	
	<tr>
		<th>Age:</th>
		<td>
			<select name="age">
				<?php 
					foreach ($ages as $age){ ?>
						<option <?php if ($age->getID() == $event->age->getID()){echo "selected";} ?> name='age' value='<?php echo $age->getID() ?>'> <?php echo $age->getName();?></option>
					<?php } 																
				?>				
			</select>			
		</td>
	</tr>
	<tr>
		<th>Image:</th>
		<td><input type="text" name="imageFileName" value="<?php echo $event->getImageFileName();?>"/></td>
	</tr>	
	<tr>
		<th>Facebook:</th>
		<td><input type="text" name="facebook" value="<?php echo $event->getFacebook();?>"/></td>
	</tr>
	<tr>
		<th>Details:</th>
		<td><textarea name="details"><?php echo $event->getDetails();?></textarea></td>
	</tr>
</table>
<input type="submit" value="Save Event" />
</form>
<script type="text/javascript">
	$('.datetime').datetimepicker({
		timeFormat: 'hh:mm',
		dateFormat: 'yy-mm-dd',
		addSliderAccess: true,
		sliderAccessArgs: { touchonly: false }
	});
</script>
