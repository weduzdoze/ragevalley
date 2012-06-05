<script type="text/javascript" src="../resources/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="../resources/js/jquery-ui-sliderAccess.js"></script>
<?php 
//prevent user from having to re-enter values if a server side price validation error occurs
//since all inputs have values specified, if the value is not set, assign an empty string to it
	if (!isset($_POST['name'])){
		$_POST['name']  = "";
	}
	if (!isset($_POST['artist'])){
		$_POST['artist']  = "";
	}
	if (!isset($_POST['genre'])){
		$_POST['genre']  = "";
	}
	if (!isset($_POST['age'])){
		$_POST['age']  = "";
	}	
	if (!isset($_POST['venue'])){
		$_POST['venue']  = "";
	}	
	if (!isset($_POST['start'])){
		$_POST['start']  = "";
	}
	if (!isset($_POST['end'])){
		$_POST['end']  = "";
	}
	if (!isset($_POST['price'])){
		$_POST['price']  = "";
	}	
	if (!isset($_POST['imageFileName'])){
		$_POST['imageFileName']  = "";
	}
	if (!isset($_POST['facebook'])){
		$_POST['facebook']  = "";
	}	
	if (!isset($_POST['details'])){
		$_POST['details']  = "";
	}	
?>
<div id="addEventForm">
<h1>Add Event</h1>
<form name="addEvent" method="post" action=".">
<input type="hidden" name="action" value="saveEvent" />
<table>
	<tr>
		<th>Name:</th>
		<td><input type="text" required="required" name="name" value="<?php echo $_POST['name']; ?>"/></td>
	</tr>
	<tr>
		<th>Artist:</th>
		<td>
			<select name="artist">
				<option name="artist" value="0">--Select--</option>
				<?php 
					foreach ($artists as $artist){ ?>
						<option <?php if ($artist->getID() == $_POST['artist']){echo "selected";} ?> name='artist' value='<?php echo $artist->getID(); ?>'> <?php echo $artist->getName(); ?></option>								
					<?php }
				?>
			</select>
		</td>
	</tr>
	<tr>
		<th>Venue:</th>
		<td>
			<select name="venue">
				<option name="venue" value="0">--Select--</option>
				<?php 
					foreach ($venues as $venue){ ?>
						<option <?php if ($venue->getID() == $_POST['venue']){echo "selected";} ?> name='venue' value='<?php echo $venue->getID(); ?>'> <?php echo $venue->getName(); ?></option>								
					<?php }
				?>
			</select>			
		</td>
	</tr>
	<tr>
		<th>Genre:</th>
		<td>
			<select name="genre">
				<option name="genre" value="0">--Select--</option>
				<?php 
					foreach ($genres as $genre){ ?>
						<option <?php if ($genre->getID() == $_POST['genre']){echo "selected";} ?> name='genre' value='<?php echo $genre->getID(); ?>'> <?php echo $genre->getName(); ?></option>								
					<?php }
				?>
			</select>
		</td>
	</tr>		
	<tr>
		<th>Start:</th>
		<td><input required="required" type="date" name="start" class="datetime" value="<?php echo $_POST['start']; ?>"/></td>
	</tr>
	<tr>
		<th>End:</th>
		<td><input required="required" type="date" name="end" class="datetime" value="<?php echo $_POST['end']; ?>"/></td>
	</tr>
	<tr>
		<th>Price:</th>
		<td><input type="text" required="required" name="price" value="<?php echo $_POST['price']; ?>"/></td>
	</tr>	
	<tr>
		<th>Age:</th>
		<td>
			<select name="age">
				<option name="age" value="0">--Select--</option>
				<?php 
					foreach ($ages as $age){ ?>
						<option <?php if ($age->getID() == $_POST['age']){echo "selected";} ?> name='age' value='<?php echo $age->getID(); ?>'> <?php echo $age->getName(); ?></option>								
					<?php }
				?>
			</select>	
		</td>
	</tr>
	<tr>
		<th>Image:</th>
		<td><input type="text" name="imageFileName" value="<?php echo $_POST['imageFileName']; ?>"/></td>
	</tr>	
	<tr>
		<th>Facebook:</th>
		<td><input type="text" name="facebook" value="<?php echo $_POST['facebook']; ?>"/></td>
	</tr>
	<tr>
		<th>Details:</th>
		<td><textarea name="details"><?php echo $_POST['details']; ?></textarea></td>
	</tr>
</table>
<input type="submit" value="Add Event" />
</form>
</div>
<script type="text/javascript">
	$('.datetime').datetimepicker({
		timeFormat: 'hh:mm',
		dateFormat: 'yy-mm-dd',
		addSliderAccess: true,
		sliderAccessArgs: { touchonly: false }
	});
</script>
