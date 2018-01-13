<?php

require_once __DIR__ . '/CategoryRenderer.php';

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
	
	static function render_form($categories, $record = null)
	{
		if (is_null($record))
		{
			// This is done to avoid a lot of null checks
			// while generating the html for the form
			$record = RecordRenderer::empty_record();
		}
		
		return '
			<form action="createrecord.php" method="post">
				<div class="record-list-item">
					<div class="record-heading">
						<input
							type="text"
							name="record_heading"
							placeholder="Pealkiri (valikuline)"
							value="' . $record['record_heading'] . '"
						>
						<span class="record-category">
							<select name="category_id">
								' . CategoryRenderer::render_select_options($categories, $record['category_id']) . '
							</select>
						</span>
						<div class="float-clear"></div>
					</div>
					<div class="record-content">
						<textarea
							name="record_content"
							cols="30"
							rows="10"
							placeholder="Sisu"
						>' . $record['record_content'] . '</textarea>
					</div>
					<div class="record-controls">
						<input type="password" name="password" placeholder="Parool">
						<button type="button">Loobu</button>
						<input type="submit" value="Salvesta">
					</div>
				</div>
			</form>
		';
	}
	
	private static function empty_record()
	{
		$record = array();
		$record['record_id'] = '';
		$record['record_heading'] = '';
		$record['record_content'] = '';
		$record['category_id'] = '';
		$record['category_name'] = '';
		
		return $record;
	}
}