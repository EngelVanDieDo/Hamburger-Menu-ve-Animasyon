<?php
include 'class/BasicDB.php';
include 'baglan.php';
if ($_POST) {
	$il = $db->from('ilceler')
	->where('il_id', $_POST['id'])
	->orderby('adi', 'asc')
	->run();
	foreach ( $il as $i ){
	echo '<option value="'.$i['id'].'">'.$i['adi'].'</option>';
	}
}
?>