<div id="ageForm">
<h2>Add Age</h2>
<form name="addAge" method="post" action=".">
	<input type="hidden" name="action" value="saveAge">
	<table>
		<tr>
			<th>Name:</th>
			<td><input type="text" name="age"></td>
		</tr>
		<tr>
			<td align="center"><input type="submit" name="submitAge" value="Add Age"></td>
		</tr>		
	</table>
</form>
</div>

<div id="ageList">
<h1>Age</h1>
<table>
	<tr>
		<th>Edit:</th>
		<th>Name:</th>	
		<th>Delete:</th>		
	</tr>
	<?php
	foreach ($ages as $row){
			echo "<tr>";			
			echo "<td><a href='index.php?action=editAge&gid=" . $row->getID() . "'>Edit</a></td>";
			echo "<td>" . $row->getName() . "</td>";
			echo "<td><a href='index.php?action=deleteRow&table=ages&id=" . $row->getID() . "'>Delete</a></td>";
			echo "</tr>";			
		}
	?>	
</table>
</div>