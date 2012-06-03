<div id="ageForm">
<h1>Add Age</h1>
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
			echo "<td><a href='index.php?action=editAge&aid=" . $row->getID() . "'>Edit</a></td>";
			echo "<td>" . $row->getName() . "</td>";
			echo "<td><a href='index.php?action=deleteRow&table=ages&id=" . $row->getID() . "'>Delete</a></td>";
			echo "</tr>";			
		}
	?>	
</table>
</div>