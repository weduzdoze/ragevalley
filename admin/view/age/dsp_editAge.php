<form name="addAge" method="post" action=".">
	<input type="hidden" name="action" value="updateAge">
	<input type="hidden" name="ageID" value="<?php echo $age->getID(); ?>">
	<table>
		<tr>
			<th>Name:</th>
			<td><input type="text" name="name" value="<?php echo $age->getName(); ?>"></td>
		</tr>		
	</table>
	<input type="submit" name="submitAge" value="Save Age">
</form>