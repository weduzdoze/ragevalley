<script type="text/javascript" src="../resources/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="../resources/js/jquery-ui-sliderAccess.js"></script>

<h1>Add Event</h1>
<form name="addEvent" method="post" action=".">
<input type="hidden" name="action" value="saveEvent" />
<table>
	<tr>
		<th>Name:</th>
		<td><input type="text" name="name" /></td>
	</tr>
	<tr>
		<th>Artist:</th>
		<td>
			<select name="artist">
				<?php 
					foreach ($artists as $artist){
						echo "<option name='artist' value='" . $artist->getID() . "'>" . $artist->getName() . "</option>" ;								
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<th>Venue:</th>
		<td>
			<select name="venue">
				<?php 
					foreach ($venues as $venue){
						echo "<option name='venue' value='" . $venue->getID() . "'>" . $venue->getName() . "</option>" ;								
					}
				?>
			</select>
		</td>
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
		<th>Start:</th>
		<td><input type="date" name="start" class="datetime"/></td>
	</tr>
	<tr>
		<th>End:</th>
		<td><input type="date" name="end" class="datetime"/></td>
	</tr>
	<tr>
		<th>Price:</th>
		<td><input type="number" name="price" /></td>
	</tr>	
	<tr>
		<th>Age:</th>
		<td>
			<select name="age">
				<?php 
					foreach ($ages as $age){
						echo "<option name='age' value='" . $age->getID() . "'>" . $age->getName() . "</option>" ;								
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<th>Image:</th>
		<td><input type="text" name="imageFileName" /></td>
	</tr>	
	<tr>
		<th>Facebook:</th>
		<td><input type="text" name="facebook" /></td>
	</tr>
	<tr>
		<th>Details:</th>
		<td><textarea name="details"></textarea></td>
	</tr>
</table>
<input type="submit" value="Add Event" />
</form>
<script type="text/javascript">
	$('.datetime').datetimepicker({
		timeFormat: 'hh:mm',
		dateFormat: 'yy-mm-dd',
		addSliderAccess: true,
		sliderAccessArgs: { touchonly: false }
	});
</script>
