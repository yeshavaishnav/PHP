<html>
<head>
<title>Home</title>
</head>
<body>
<h1>Welcome</h1>
<p>Hello <?php echo htmlspecialchars($name);?> </p>
<ul>
<?php foreach($colors as $color): ?>
<li><?php echo htmlspecialchars($color);?></li>
<?php endforeach; ?>
</ul>
</body>
</html>