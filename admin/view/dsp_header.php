<html>
<body>
<head>

<link href="../resources/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../resources/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../resources/js/jquery-ui.min.js"></script>
<?php 
	if(isset($_SESSION['isLoggedIn'])){
		echo 'Welcome ' . $_SESSION['firstName'] . '!';
	}
?>
<ul>
	<?php 
	if(isset($_SESSION['isLoggedIn'])){
		echo " <li><a href='index.php?action=manage'>Manage</a></li>";
		echo " <li><a href='index.php?action=viewEvents'>Events</a></li>";
		echo " <li><a href='index.php?action=logout'>Logout</a></li>";
	}
	else {
		echo " <li><a href='index.php?action=login'>Login</a></li> ";
		echo " <li><a href='index.php?action=addUser'>Register</a></li> ";
	}
	?>
		
</ul>
</head>