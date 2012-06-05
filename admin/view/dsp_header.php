<html>
<body>
<head>

<link href="../resources/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="../resources/css/admin.css"/>
<script type="text/javascript" src="../resources/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../resources/js/jquery-ui.min.js"></script>
<?php 
	if(isset($_SESSION['isLoggedIn'])){
		echo '<center>Welcome ' . $_SESSION['firstName'] . '! </center>';
	}
	if (isset($error) && strlen($error) > 0){
		if(isset($_SESSION['isLoggedIn'])){
			echo "<br />";
		} 
		echo "<center><span id='error'>" . $error . "</span></center>";
	}
?>

</head>
<div id="header">
	<img src="../resources/images/adminPhoto.png" align="center" class="header"/>

	<div class="menu">
	<?php
	if(isset($_SESSION['isLoggedIn'])){
	echo "<a class='headerLink' href='index.php?action=events'>Events</a>";	
	echo "<a class='headerLink' href='index.php?action=users'>Accounts</a>";
	echo "<a class='headerLink' href='index.php?action=logout'>Logout</a>";
	echo "<a class='headerLink' href='../index.php'>Main Site</a>";
	}
	else{
	echo "<a class='headerLink' href='index.php?action=login'>Login</a>";
	echo "<a class='headerLink' href='index.php?action=addUser'>Register</a>";
	echo "<a class='headerLink' href='../index.php'>Main Site</a>";
	}
	?>
	
</div>	
</div>		
<div class="container">


