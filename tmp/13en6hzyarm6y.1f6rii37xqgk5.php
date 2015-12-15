<div class="w3-row">
	<!-- <h3><?php echo $top; ?></h3>-->
	<nav class="w3-sidenav w3-col m2 l2" style="max-width:10%;">
	<?php foreach (($dashmenu?:array()) as $m): ?>
	 <a href="<?php echo $m['href']; ?>"><?php echo $m['rel']; ?></a>
	 <?php endforeach; ?>
	 </nav>
	 <div class="w3-col m9 l9 w3-center" style="display:block;margin-left:10%; max-width:90%;">
	 	<h3><?php echo $top; ?></h3>
	 	<?php echo $this->render($subinc,$this->mime,get_defined_vars()); ?>
	 </div>
</div>

