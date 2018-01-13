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
}