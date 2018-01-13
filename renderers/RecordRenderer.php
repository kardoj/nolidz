<?php
class RecordRenderer
{
	static function render($records)
	{
		$html = array();
		foreach ($records as $r)
		{
			array_push($html, '
				<div class="record-list-item">
					<div class="record-heading">
						' . $r['record_heading'] . '
						<span class="record-category">' . $r['category_name'] . '</span>
						<div class="float-clear"></div>
					</div>
					<div class="record-content">' . $r['record_content'] . '</div>
				</div>
			');
		}
		return implode($html);
	}
}