<?php
	// Creates a new record
	if (isSet($_POST['password']) && 
		isSet($_POST['record_heading']) &&
		isSet($_POST['category_id']) &&
		isSet($_POST['record_content']))
	{
		require_once __DIR__ . '/config/Auth.php';
		require_once __DIR__ . '/services/Db.php';

		if (Auth::pwd_is_correct($_POST['password']))
		{
			$db = new Db();
			$db_call = $db->execute_params('
				insert into record(heading, content, category_id) values($1, $2, $3) returning id
			', array($_POST['record_heading'], $_POST['record_content'], $_POST['category_id']));
			
			if (empty($db_call))
			{
				return_to_new();
			}
			else
			{
				// TODO: Return to the record view
				header('Location: index.php');
			}
		}
		else
		{
			return_to_new();
		}
	}
	
	function return_to_new()
	{
		$params = array();
		array_push($params, 'record_heading=' . urlencode($_POST['record_heading']));
		array_push($params, 'category_id=' . urlencode($_POST['category_id']));
		array_push($params, 'record_content=' . urlencode($_POST['record_content']));
		
		header('Location: newrecord.php?' . implode('&', $params));
	}
?>