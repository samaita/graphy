<?php
	// requires php5
	define('UPLOAD_DIR', ''); // Saved to this App path only.
	$img = $_POST['imgBase64'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$id = uniqid();
	$name = UPLOAD_DIR . '' . $id . '.png';
	$success = file_put_contents($name, $data);
	
	$getFile = file("data.html"); // Get the file
	//unset($getFile[count($getFile)-1]); // Remove Last Array
	$getFileS = implode($getFile); // Turn Array to String but in exact condition, not turn it to one line
	
$addThis = <<<EOT

<div class="frame" style="background-image: url(data/$id.png); background-size: 260px;"></div>
EOT;
	
	file_put_contents("data.html", $getFileS . $addThis); // Join old data and new data

?>