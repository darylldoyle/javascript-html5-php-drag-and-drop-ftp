<?php
///////////////////////////////////////////////////////////////////
//					Variables go here
//
//					Server Connection
$server = $_COOKIE['host'];
$ftp_user_name = $_COOKIE['uname'];
$ftp_user_pass = $_COOKIE['pass'];
//
//					Transfer mode (Comment one out)
//$mode = FTP_ASCII;
$mode = FTP_BINARY;
//
//					Directory to upload to
$up_dir = "/htdocs/upload_test";





// Destination folder for downloaded files
$upload_folder = 'tmp';

// If the browser supports sendAsBinary () can use the array $ _FILES
if(count($_FILES)>0) { 
	if( move_uploaded_file( $_FILES['upload']['tmp_name'] , $upload_folder.'/'.$_FILES['upload']['name'] ) ) {
		echo 'done';
	}
	exit();
} else if(isset($_GET['up'])) {
	// If the browser does not support sendAsBinary ()
	if(isset($_GET['base64'])) {
		$content = base64_decode(file_get_contents('php://input'));
	} else {
		$content = file_get_contents('php://input');
	}

	$headers = getallheaders();
	$headers = array_change_key_case($headers, CASE_UPPER);
	
	if(file_put_contents($upload_folder.'/'.$headers['UP-FILENAME'], $content)) {
		echo 'done';
	}
}


$connection = ftp_connect($server);
$login = ftp_login($connection, $ftp_user_name, $ftp_user_pass);
if (!$connection || !$login) { $stat2 = 'Connection attempt failed!'; }
else { $stat2 = 'Connected';}
$name = $headers['UP-FILENAME'];
$source = $upload_folder.'/'.$name;
$dest = $up_dir.'/'.$name;
$upload = ftp_put($connection, $dest, $source, $mode);
if (!$upload) { $stat = 'FTP upload failed!'; }
else { $stat = 'FTP succeeded';}
ftp_close($connection); 

//////////////////////////////////////////////////////////////////////
//					Comment this out when you're done with the logs
//////////////////////////////////////////////////////////////////////
$myFile = "log.txt";
$fh = fopen($myFile, 'w');
$stringData = 'Source: '.$source."   ".'Dest: '.$dest."   " .'Status: '.$stat."   " .'Status 2: '.$stat2;
fwrite($fh, $stringData);
//////////////////////////////////////////////////////////////////////


unlink($source);
exit();

?>