<?php
class Records
{
	private $db = null;
	
	function __construct($db)
	{
		$this->db = $db;
	}
	
	function find($id)
	{
		$id = intval($id);
		if (empty($id)) return null;

		$db_call = $this->db->execute_params('
			select
				record.id as record_id,
				record.heading as record_heading,
				record.content as record_content,
				record.category_id,
				category.name as category_name
			from record
				inner join category on category.id = record.category_id
			where record.id = $1
			limit 1
		', array($id));

		if (count($db_call) > 0)
		{
			return $db_call[0];
		}
		else
		{
			return null;
		}
	}

        function get_random()
        {
                return $this->db->execute('
                        select
                                record.id as record_id,
                                record.heading as record_heading,
                                record.content as record_content,
                                record.category_id,
                                category.name as category_name
                        from record
                                inner join category on category.id = record.category_id
                        order by random()
                        limit 1
                ')[0];
        }
}
