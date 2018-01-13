<?php
class CategoryRenderer
{	
	static function render_select_options($categories, $selected_id)
	{
		$html = array();
		foreach ($categories as $c)
		{
			$selected = $c['id'] == $selected_id ? 'selected="selected"' : '';
			array_push($html, '
				<option value="' . $c['id'] .'" ' . $selected . '>' . $c['name'] . '</option>
			');
		}
		
		return implode($html);
	}
}