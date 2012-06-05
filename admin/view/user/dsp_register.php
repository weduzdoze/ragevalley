<!--- load google hosted jquery --->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("search", "1");
  google.load("jquery", "1.4.2");
  google.load("jqueryui", "1.7.2");
</script>

	<head>
		<title></title>
		<h2>Register</h2>
	</head>

<form name="registerForm" method="post" action="." id="registerForm">
<input type="hidden" name="action" value="saveUser">
<table>
	<tr>
		<th>Username:</th>
		<td><input type="text" name="username" id="username"/></td>
	</tr>
	<tr>
		<th>Password:</th>
		<td><input type="password" name="password" id="password" /></td>
	</tr>
	<tr>
		<th>Confirm:</th>
		<td><input type="password" name="confirmPass" id="confirm" /></td>
	</tr>	
	<tr>
		<th>Email:</th>
		<td><input type="text" name="email" id="email"/></td>
	</tr>	
	<tr>
		<th>First Name:</th>
		<td><input type="text" name="firstname" id="firstname"/></td>
	</tr>		
	<tr>
		<th>Last Name:</th>
		<td><input type="text" name="lastname" id="lastname"/></td>
	</tr>		
</table>
<input type="submit" name="submitRegister" id="submitRegister"value="Register">
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$('#submitRegister').click(function(e) {
			e.preventDefault();
			var username = $('#username').val();
			var pass = $('#password').val();
			var confirm = $('#confirm').val();
			var email = $('#email').val();
			var firstname = $('#firstname').val();
			var lastname = $('#firstname').val();
			
			if (username == '' || pass == '' || confirm == '' || email == '' || firstname == '' || lastname == ''){
				alert ('Please fill out all fields.');
			}
			else {		
				if (pass != confirm) {
					alert('Passwords do not match!');
				}
				else {
					$('#registerForm').submit();
				}
			}			
		});
	});
</script>

