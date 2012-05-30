<html>
<body>

	<head>
		<title></title>
		<h2>Register</h2>
	</head>

<form name="registerForm" method="post" action=".">
<input type="hidden" name="action" value="saveUser">
<table>
	<tr>
		<th>Username:</th>
		<td><input type="text" name="username" /></td>
	</tr>
	<tr>
		<th>Password:</th>
		<td><input type="text" name="password" /></td>
	</tr>
	<tr>
		<th>Email:</th>
		<td><input type="text" name="email" /></td>
	</tr>	
	<tr>
		<th>First Name:</th>
		<td><input type="text" name="firstname" /></td>
	</tr>		
	<tr>
		<th>Last Name:</th>
		<td><input type="text" name="lastname" /></td>
	</tr>		
</table>
<input type="submit" name="submitForm" value="Register">
</form>


</body>
</html>