<?php 
	if (!isset($_POST['searchSubmit'])){
		$_POST['search'] = "";
		$_POST['genre'] = "";
		$_POST['artist'] = "";
		$_POST['location'] = "";
		$_POST['age'] = "";
	}
	else {
	}
?>

<h1>Find an Event</h1>
<form name="eventSearch" action="." method="post" id="eventSearch">
	<input type="hidden" name="action" value="eventSearch">
	<table name="eventSearchTable">
		<tr>
			<th>Search:</th>
			<td><input type="text" name="search" value="<?php echo $_POST['search']; ?>"></td>
		</tr>
		<tr>
			<th>Genre:</th>
			<td>
				<select name="genre">
					<option name="none" value="0">--Select--</option>
					<?php 
						foreach ($genres as $genre){ ?>
							<option <?php if ($genre->getID() == $_POST['genre']){echo "selected";} ?> name='genre' value='<?php echo $genre->getID() ?>'> <?php echo $genre->getName();?></option>
						<?php } 																
					?>				
				</select>
			</td>
		</tr>
		<tr>
			<th>Artist:</th>
			<td>
				<select name="artist">
					<option name="none" value="0">--Select--</option>
					<?php 
						foreach ($artists as $artist){ ?>
							<option <?php if ($artist->getID() === $_POST['artist']){echo "selected";} ?> name='artist' value='<?php echo $artist->getID() ?>'> <?php echo $artist->getName() ?></option>
						<?php } 																
					?>				
				</select>
			</td>
		</tr>
		<tr>
			<th>Location:</th>
			<td>
			<select name="location">
				<option name="none" value="0">--Select--</option>
				<?php 
					foreach ($locations as $location){ ?>
						<option <?php if ($location->getID() === $_POST['location']){echo "selected";} ?>name='location' value='<?php echo $location->getID() ?>'><?php echo $location->getCity() . ", " . $location->getState();?></option>
					<?php }
				?>
			</select>
			</td>
		</tr>	
		<tr>
			<th>Age:</th>
			<td>
				<select name="age">
					<option name="none" value="0">--Select--</option>
					<?php 
						foreach ($ages as $age){ ?>
							<option <?php if ($age->getID() === $_POST['age']){echo "selected";} ?>name='age' value='<?php echo $age->getID() ;?>'><?php echo $age->getName();?></option>								
						<?php }
					?>
				</select>
			</td>
		</tr>		
	</table>
	<input type="submit" name="searchSubmit" value="Search">
</form>

<?php 
	if (isset($_POST['searchSubmit'])){ ?>
		<table name='searchResults'>
			<tr>
				<th>Name</th>
				<th>Artist</th>
				<th>Date</th>
				<th>Venue</th>
			</tr>
			<?php foreach ($events as $event){ 
				$date = new DateTime($event->getStart());
				?>
			<tr>
				<td><?php echo $event->getName(); ?></td>
				<td><?php echo $event->artist->getName(); ?></td>
				<td><?php echo $date->format('m/d/y') ?></td>
				<td><?php echo $event->venue->getName(); ?></td>
			</tr>
		<tr>
			
		</tr>
<?php
        } ?>
	</table>
	<?php	
	}
?>
