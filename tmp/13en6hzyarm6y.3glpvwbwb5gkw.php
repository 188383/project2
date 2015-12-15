<nav class="w3-topnav w3-blue w3-padding-left-16">
	<ul>
		<?php foreach (($links?:array()) as $rel=>$link): ?>
			<a href="<?php echo $link; ?>"><?php echo $rel; ?></a>
		<?php endforeach; ?>
	</ul>
</nav>
