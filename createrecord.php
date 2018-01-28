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
			
			$category_id = $_POST['category_id'];
			if (!empty($_POST['new_category']))
			{	
				// Check whether the new category already exists
				require_once __DIR__ . '/services/Categories.php';
				$categories_svc = new Categories($db);
				$cat = $categories_svc->find($_POST['new_category']);
				
				if (isSet($cat))
				{
					$category_id = $cat['id'];	
				}
				else
				{
					$category_id = $db->execute_params(
						'insert into category(name) values ($1) returning id',
						array($_POST['new_category'])
					)[0]['id'];
				}
			}
			
			$db_call = $db->execute_params('
				insert into record(heading, content, category_id) values($1, $2, $3) returning id
			', array($_POST['record_heading'], $_POST['record_content'], $category_id));
				
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
		array_push($params, 'new_category=' . urlencode($_POST['new_category']));
		
		header('Location: newrecord.php?' . implode('&', $params));
	}
?>
