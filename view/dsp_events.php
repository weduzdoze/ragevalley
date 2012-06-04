<h1>Find an Event</h1>
<form name="eventSearch" action="." method="post">
	<input type="hidden" name="action" value="eventSearch">
	<table name="eventSearchTable">
		<tr>
			<th>Search:</th>
			<td><input type="text" name="search"></td>
		</tr>
		<tr>
			<th>Genre:</th>
			<td>
				<select name="genre">
					<option name="none" value="0">--Select--</option>
					<?php 
						foreach ($genres as $genre){ ?>
							<option name='genre' value='<?php echo $genre->getID() ?>'> <?php echo $genre->getName();?></option>
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
							<option name='artist' value='<?php echo $artist->getID() ?>'> <?php echo $artist->getName();?></option>
						<?php } 																
					?>				
				</select>
			</td>
		</tr>		
	</table>
</form>