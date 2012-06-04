<html>
<body>
<head>

<link href="../resources/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">
<link href="../resources/css/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../resources/css/admin.css"/>
<script type="text/javascript" src="../resources/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../resources/js/jquery-ui.min.js"></script>
<?php 
	if(isset($_SESSION['isLoggedIn'])){
		echo 'Welcome ' . $_SESSION['firstName'] . '!';
	}
?>

</head>
<div id="headerPhoto">
	<img src="../resources/images/adminPhoto.png" align="center" class="header"/>
</div>	
	<div id="menu">
	<?php
	if(isset($_SESSION['isLoggedIn'])){
	echo "<a class='headerLink' href='index.php?action=events'>Events</a>";
	echo "<a class='headerLink' href='index.php?action=logout'>Logout</a>";
	echo "<a class='headerLink' href='index.php?action=users'>Accounts</a>";
	}
	else{
	echo "<a class='headerLink' href='index.php?action=login'>Login</a>";
	echo "<a class='headerLink' href='index.php?action=addUser'>Register</a>";
	}
	?>

	</div>
<div class="container">


