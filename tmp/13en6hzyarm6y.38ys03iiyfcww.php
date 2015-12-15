<!DOCTYPE html>
<div class="w3-section w3-center w3-animate-opacity">
	<h3>Profile</h3>
	<table id="table" class="w3-card-4 w3-table w3-striped w3-bordered w3-border">
	<tr>
	<?php foreach (($user?:array()) as $key=>$u): ?>
		<th><?php echo $key; ?></th>
	<?php endforeach; ?>
	<th></th>
	</tr>
	<tr>
	<?php foreach (($user?:array()) as $key=>$use): ?>
		<td id="<?php echo $key; ?>"><?php echo $use; ?></td>
	<?php endforeach; ?>
	<td><button id="button" value="edit" class="w3-btn w3-blue w3-tiny">edit</button>
	</tr>
	</table>
	<script src="ui/js/profile.js"></script>
</div>
