<?php
	require_once __DIR__ . '/services/Db.php';
	require_once __DIR__ . '/services/RandomRecord.php';
	require_once __DIR__ . '/renderers/RecordRenderer.php';
	require_once __DIR__ . '/services/Records.php';
	
	$db = new Db();
	$random_record_svc = new RandomRecord($db);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles.css">
	<title>nolidz</title>
	<script src="js/cancel-link.js"></script>
</head>
<body>
	<?php require __DIR__ . '/categorylist.php'; ?>
	<div id="contentbody">	
		<?php require __DIR__ . '/searchbar.php'; ?>
	
		<div id="content">
			<?php
				$record = null;
				if (isSet($_GET['record_id']) && !empty($_GET['record_id']))
				{
					$records_svc = new Records($db);
					$record = $records_svc->find($_GET['record_id']);
				}
				
				if (empty($record)) $record = $random_record_svc->get();

				echo RecordRenderer::render(array($record));
			?>
		</div>
	</div>
	
	<div class="float-clear"></div>
</body>
</html>
