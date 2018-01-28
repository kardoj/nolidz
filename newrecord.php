<?php
	require_once __DIR__ . '/services/Db.php';
	require_once __DIR__ . '/services/Categories.php';
	require_once __DIR__ . '/renderers/RecordRenderer.php';
	require_once __DIR__ . '/helpers/RecordHelper.php';
	
	$db = new Db();
	$categories = new Categories($db);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles.css">
	<title>nolidz</title>
</head>
<body>
        <?php require __DIR__ . '/categorylist.php'; ?>
        <div id="contentbody">
                <?php require __DIR__ . '/searchbar.php'; ?>

                <div id="content">
	                <?php
        	                $record = RecordHelper::record_from_params($_GET);
                	        echo RecordRenderer::render_form($categories->get(), $record);
               		 ?>
                </div>
        </div>

        <div class="float-clear"></div>
</body>
</html>
