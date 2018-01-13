<?php
	require_once __DIR__ . '/services/Db.php';
	require_once __DIR__ . '/services/RandomRecord.php';
	require_once __DIR__ . '/renderers/RecordRenderer.php';
	
	$db = new Db();
	$random_record = new RandomRecord($db);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles.css">
	<title>nolidz</title>
</head>
<body>
	<?php require __DIR__ . '/searchbar.php'; ?>
	<?php require __DIR__ . '/categorylist.php'; ?>
	
	<div id="content">
		<?php echo RecordRenderer::render($random_record->get()); ?>
	</div>
	
	<div class="float-clear"></div>
</body>
</html>
