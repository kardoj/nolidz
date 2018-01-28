<?php
class Categories
{
	private $db = null;
	
	function __construct($db)
	{
		$this->db = $db;
	}
	
	function get()
	{
		return $this->db->execute('
			select
				id,
				name
			from category 
			order by name asc
		');
	}

	function find($name_or_id)
	{
		$db_call = $this->db->execute_params('
			select id, name
			from category
			where id = $1 or name = $2
			limit 1
		', array(intval($name_or_id), $name_or_id));

		if (count($db_call) > 0)
		{
			return $db_call[0];
		}
		else
		{
			return null;
		}
	}
}
