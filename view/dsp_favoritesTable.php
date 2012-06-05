<!--- load google hosted jquery --->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("search", "1");
  google.load("jquery", "1.4.2");
  google.load("jqueryui", "1.7.2");
</script>
<?php 
	 session_start();
	//if the artist query string exists
	if(isset($_GET['artist'])){
		//if the favorites array is not defined, create it
		if (!isset($_SESSION['favs'])){
			$_SESSION['favs'] = array();
		}
		//if there are less than 3 items in the array, use the array push to add the artist to the end
		if (count($_SESSION['favs']) < 3){
			array_push($_SESSION['favs'], $_GET['artist']);
		}
		//if there are 3 items in the array, remove the last item using array_pop, then use array push to add
		//the new artist to the end
		else {
			array_pop($_SESSION['favs']);
			array_push($_SESSION['favs'], $_GET['artist']);
		}
	}
	//if the remove query string exists, remove the last item in the array
	if(isset($_GET['remove'])){
		array_pop($_SESSION['favs']);
	}
	//if the down1 query string exists, switch elements 0 and 1
	if(isset($_GET['down1'])){
		//if there is more than 1 item in the array
		if (count($_SESSION['favs']) > 1){
			//switch the elements
			$first = $_SESSION['favs'][0];
			$second = $_SESSION['favs'][1];
			$_SESSION['favs'][1] = $first;
			$_SESSION['favs'][0] = $second;	
		}
	}	
	//if the down2 query string exists, switch elements 1 and 2
	if(isset($_GET['down2'])){
		//if there are more than 2 items in the array
		if (count($_SESSION['favs']) > 2){			
			//switch the elements
			$second = $_SESSION['favs'][1];
			$third = $_SESSION['favs'][2];
			$_SESSION['favs'][1] = $third;
			$_SESSION['favs'][2] = $second;	
		}
	}			
?>

<table name="artistsTable">
	<tr>
		<th><button id="down1">Down</button></th>
		<th>1.</th>
		<td><span id="artist1"><?php if(isset($_SESSION['favs'][0])){echo $_SESSION['favs'][0];} ?></span></td>
	</tr>
	<tr>
		<th><button id="up2">Up</button><button id="down2">Down</button></th>
		<th>2.</th>
		<td><span id="artist2"><?php if(isset($_SESSION['favs'][1])){echo $_SESSION['favs'][1];} ?></span></td>
	</tr>
	<tr>
		<th><button id="up3">Up</button></th>
		<th>3.</th>
		<td><span id="artist3"><?php if(isset($_SESSION['favs'][2])){echo $_SESSION['favs'][2];} ?></span></td>
	</tr>	
</table>

<script type="text/javascript">
	$(document).ready(function() {
		$('#down1').click(function() {		
			$.ajax({
			  method: "post",
			  url: 'view/dsp_favoritesTable.php',
			  data: { down1 : 'down1'},
			  datatype: "html",
			  success: function(data) {
				$('#favoritesTable').empty();
				$('#favoritesTable').html(data);
			  }
			});
		});
		$('#down2').click(function() {		
			$.ajax({
			  method: "post",
			  url: 'view/dsp_favoritesTable.php',
			  data: { down2 : 'down2'},
			  datatype: "html",
			  success: function(data) {
				$('#favoritesTable').empty();
				$('#favoritesTable').html(data);
			  }
			});
		});
		$('#up2').click(function() {		
			$.ajax({
			  method: "post",
			  url: 'view/dsp_favoritesTable.php',
			  data: { down1 : 'down1'},
			  datatype: "html",
			  success: function(data) {
				$('#favoritesTable').empty();
				$('#favoritesTable').html(data);
			  }
			});
		});	
		$('#up3').click(function() {		
			$.ajax({
			  method: "post",
			  url: 'view/dsp_favoritesTable.php',
			  data: { down2 : 'down2'},
			  datatype: "html",
			  success: function(data) {
				$('#favoritesTable').empty();
				$('#favoritesTable').html(data);
			  }
			});
		});		
	});
</script>