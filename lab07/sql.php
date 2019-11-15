<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		try{
			$db = new PDO("mysql:dbname=college;host=localhost", "root", "root");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$rows = $db->query("SELECT * FROM student");
			foreach ($rows as $row) { ?>
				<ul>
					<li><?= $row ?> </li>
				</ul>
			<?php }
		} catch (PDOException $ex) { ?>
			<p>Sorry, a database error occurred. Please try again later.</p>
    		<p>(Error details: <?= $ex->getMessage() ?>)</p>
		<?php } ?>
</body>
</html>
