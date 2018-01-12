<?php

require_once __DIR__ . '/services/Db.php';

$db = new Db();

$records = $db->execute('select record.heading, record.content, category.name as category_name from record inner join category on category.id = record.category_id');

foreach($records as $r)
{
	echo $r['heading'] . ' | ' . $r['content'] . ' | ' . $r['category_name'] . '<br />';
}

$result = $db->execute_params('select name from category where id = $1', array(1));
echo $result[0]['name'];
