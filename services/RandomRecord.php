<?php
class RandomRecord
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
				record.id as record_id,
				record.heading as record_heading,
				record.content as record_content,
				category.id as category_id,
				category.name as category_name
			from record 
				inner join category on category.id = record.category_id
			order by random()
			limit 1
		');
	}
}