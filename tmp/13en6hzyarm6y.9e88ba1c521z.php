<!DOCTYPE html>

<html>
<head>
<?php echo $this->render($head,$this->mime,get_defined_vars()); ?>
</head>
<body>
<header id="main-header">
<?php echo $this->render($mainnav,$this->mime,get_defined_vars()); ?>
</header>
<section id="main-section">

</section>
<footer id="main-footer">
<?php echo $this->render($foot,$this->mime,get_defined_vars()); ?>
</footer>
</body>
</html>
