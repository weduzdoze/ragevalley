<!--- load google hosted jquery --->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("search", "1");
  google.load("jquery", "1.4.2");
  google.load("jqueryui", "1.7.2");
</script>

<div id="favoriteArtists">
<h2>My Favorite Artists</h2>
<!--- create empty div for favorite artists table
      the table gets loaded through jquery ajax --->
<div id="favoritesTable">

</div>


<form name="favoriteArtistsForm">
<select name="artist" id="artist">
	<option name="none" value="0">--Select--</option>
	<?php 
		foreach ($artists as $artist){ ?>
			<option name='artist' value='<?php echo $artist->getName() ?>'> <?php echo $artist->getName() ?></option>
		<?php } 																
	?>				
</select>
</form>
<button id="addArtist">Add Artist</button><button id="removeArtist">Remove Artist</button>
</div>
<!--- jquery .click functions for the favorite artist buttons.
      the buttons essentially AJAX an action to dsp_favoritesTable.php 
	  which executes specific php array functions based on the action supplied through the ajax request--->
<script type="text/javascript">
	$(document).ready(function() {
		$('#favoritesTable').load('view/dsp_favoritesTable.php');
		$('#addArtist').click(function() {		
			$.ajax({
			  method: "post",
			  url: 'view/dsp_favoritesTable.php',
			  data: 'artist='+$('#artist').val(),
			  datatype: "html",
			  success: function(data) {
				$('#favoritesTable').empty();
				$('#favoritesTable').html(data);
			  }
			});
		});
		$('#removeArtist').click(function() {		
			$.ajax({
			  method: "post",
			  url: 'view/dsp_favoritesTable.php',
			  data: { remove : 'remove'},
			  datatype: "html",
			  success: function(data) {
				$('#favoritesTable').empty();
				$('#favoritesTable').html(data);
			  }
			});
		})
		$('#down1').click(function() {		
			alert('hello');
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
		})		
	});
</script>