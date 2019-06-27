<?php
	$index = $_GET['index'];
	$data = file_get_contents('members.json');
	$data = json_decode($data);
	unset($data[$index]);
	$first_data = json_encode($data);
	for ($i=0; $i <= count($data); $i++) { 
		if($i!=$index){
			$first_data = str_replace('"'.$i.'":{','{',$first_data);
		}
	}
	$first = str_replace('{{','[{',$first_data);
	$last = str_replace('}}','}]',$first);
	$convert_to = json_encode($last,JSON_PRETTY_PRINT);
	file_put_contents('members.json', $last);
	header('location: home.php');
?>