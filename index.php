<?php 
session_start();
ob_start(); ?>
<!DOCTYPE HTML>
<head>
	<title>HTML5 Download</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="main.css" rel="stylesheet" type="text/css">
<script src="html5uploader.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
 $(document).ready(function() {
 	 $("#listing").load("ftp.php");
   var refreshId = setInterval(function() {
      $("#listing").load('ftp.php?randval='+ Math.random());
   }, 9000);
   $.ajaxSetup({ cache: false });
});
</script>
<!-- Thanks to http://code.google.com/p/html5uploader/ for the original script -->
</head>
<body onload="new uploader('drop', 'status', 'uploader.php');">
<div id="login">
<?php include('login.php'); ?>
</div>
<div id="listing">
</div>

	<div id="box">
		<div id="status">Drop files on blue section ... 
		</div>
		<div id="drop"></div>
	</div>
	<div id="list"></div>

</body>
</html>

<?php ob_flush(); ?>