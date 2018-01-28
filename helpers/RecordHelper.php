<?php
class RecordHelper
{
	// $get is $_GET
	static function record_from_params($get)
	{
		$record = array();
		$record['record_heading'] = isSet($get['record_heading']) ? $get['record_heading'] : '';
		$record['category_id'] = isSet($get['category_id']) ? $get['category_id'] : '';
		$record['record_content'] = isSet($get['record_content']) ? $get['record_content'] : '';
		
		return $record;
	}
}
