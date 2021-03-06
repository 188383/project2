<div id="rooms" class="container w3-section w3-animate-opacity">
	<p><?php echo $error; ?></p>
	<p class="w3-btn-floating w3-blue w3-center"><a href="<?php echo $room; ?>" >+</a></p>
	<!--
		This is where the original table will displayed. The user then has the option 
		of loading more profile pages(That is, the user can load more items here )
	-->
	<?php foreach (($rooms?:array()) as $room): ?>
		<div id=<?php echo $room['id']; ?> class="w3-row w3-card-4 w3-margin-8 w3-khaki">
			<div class="w3-quarter w3-border w3-center">
				<img src="content/<?php echo $image; ?>" style="width:100%;" alt="image"></img>
			</div>
			<div class="w3-twothird w3-padding-8 w3-center">
				<p class="w3-quarter"><?php echo $room['username']; ?></p>
				<p class="w3-quarter"><?php echo $room['firstname']; ?></p>
				<p class="w3-quarter"><?php echo $room['lastname']; ?></p>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="w3-right">
		<button class="w3-btn w3-blue w3-margin-8">load more</button> 
	</div>
</div>
<script>
$(function(){
	
});
</script>
