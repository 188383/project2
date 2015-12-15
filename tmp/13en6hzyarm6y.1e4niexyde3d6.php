<div class="w3-section">
	<h3>List of Rooms</h3>
	<h6 class="w3-animate-opacity"><?php echo $message; ?></h6>
	<div ></div>
	<table id="table" class="w3-table-all w3-hoverable" >
		<tr>
			<?php foreach (($room['0']?:array()) as $val): ?>
				<th><a href="/user/<?php echo $room['0']['id']; ?>">as</a>
			<?php endforeach; ?>
		</tr>	
	</table>
	
</div>
