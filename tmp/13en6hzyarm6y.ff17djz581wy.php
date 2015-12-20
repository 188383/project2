<!DOCTYPE html>

<html>
<head>
<!--
	The appropriate headers should be included by
	a seperate file for the header declarations
-->
<?php echo $this->render($head,$this->mime,get_defined_vars()); ?>
</head>
<body>
<!--
	The body should be seperated into chunks so as not to make it difficult 
	So that the different parts can be loaded as needed. Think in the style of angular js.
-->
<header id="main-header">
<?php echo $this->render($mainnav,$this->mime,get_defined_vars()); ?>
</header>

<section id="main-section">
	<?php echo $this->render($body,$this->mime,get_defined_vars()); ?>
</section>

<footer id="main-footer">
<?php echo $this->render($foot,$this->mime,get_defined_vars()); ?>
</footer>
<script>
	
</script>
</body>
</html>
