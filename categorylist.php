<?php
	if (!isSet($db)) throw new Exception('$db (Db instance) is not set, can not continue');
	
	require_once __DIR__ . '/services/Categories.php';

	$categories_svc = new Categories($db);
	$categories = $categories_svc->get();
?>

<div id="categorylist">
        <a href="index.php"><img src="img/logo.svg" alt="logo" id="logo" /></a>
	
	<ul>
		<?php foreach ($categories as $cat): ?>
			<li><?php echo $cat['name']; ?></li>
		<?php endforeach; ?>
	</ul>
</div>
