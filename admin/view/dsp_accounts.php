<div id="accountForm">
<h2>Add User</h2>
<form name="addAge" method="post" action=".">
	<input type="hidden" name="action" value="saveUser">
	<table>
		<tr>
			<th>Username:</th>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<th>Email:</th>
			<td><input type="email" name="email"></td>
		</tr>		
		<tr>
			<th>First Name:</th>
			<td><input type="text" name="firstname"></td>
		</tr>
		<tr>
			<th>Last Name:</th>
			<td><input type="text" name="lastname"></td>
		</tr>		
		<tr>
			<th>Password:</th>
			<td><input type="text" name="password"></td>
		</tr>
		<tr>
			<th>Confirm:</th>
			<td><input type="text" name="confirmPass"></td>
		</tr>			
		<tr>
			<td align="center"><input type="submit" name="submitUser" value="Add User"></td>
		</tr>		
	</table>
</form>
</div>

<div id="userList">
<h1>Users</h1>
<table>
	<tr>
		<th>Edit:</th>
		<th>Username:</th>
		<th>Name:</th>	
		<th>Delete:</th>		
	</tr>
	<?php
	foreach ($users as $row){
			echo "<tr>";			
			echo "<td><a href='index.php?action=editAge&gid=" . $row->getID() . "'>Edit</a></td>";
			echo "<td>" . $row->getUserName() . "</td>";
			echo "<td>" . $row->getFirstName() . " " . $row->getLastName() . "</td>";			
			echo "<td><a href='index.php?action=deleteRow&table=users&id=" . $row->getID() . "'>Delete</a></td>";
			echo "</tr>";			
		}
	?>	
</table>
</div>