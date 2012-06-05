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
		/* on page load, ajax the dsp_favoritesTable.php page to load the table */
		$('#favoritesTable').load('view/dsp_favoritesTable.php');
		/* when the add artist button is clicked: */
		$('#addArtist').click(function() {		
			$.ajax({
			  method: "post",
			  url: 'view/dsp_favoritesTable.php',
			  /* send the value of the artist dropdown menu to the dsp_favoritesTable.php page */
			  data: 'artist='+$('#artist').val(),
			  datatype: "html",
			  /* ajax callback success function */
			  success: function(data) {
				/* empty the div containing the old table */
				$('#favoritesTable').empty();
				/* reload the div with the ajax response (the updated table) */
				$('#favoritesTable').html(data);
			  }
			});
		});
		$('#removeArtist').click(function() {		
			$.ajax({
			  method: "post",
			  url: 'view/dsp_favoritesTable.php',
			  /* send the action remove to the dsp_favoritesTable.php page */
			  data: { remove : 'remove'},
			  datatype: "html",
			  /* ajax callback success function */
			  success: function(data) {
				/* empty the div containing the old table */
				$('#favoritesTable').empty();
				/* reload the div with the ajax response (the updated table) */
				$('#favoritesTable').html(data);
			  }
			});
		});	
	});
</script>