<?php
session_start();

if(isset($_REQUEST['submitted']))
{
	if((empty($_REQUEST['host'])) || (empty($_REQUEST['uname'])) || (empty($_REQUEST['port'])) || (empty($_REQUEST['pass'])))
	{
		print 'Error! Fill all sections out!';
	}
	else {
		setcookie("host", $_REQUEST['host']);
		setcookie("uname", $_REQUEST['uname']);
		setcookie("port", $_REQUEST['port']);
		setcookie("pass", $_REQUEST['pass']);
		$_SESSION['path'] = "/";
		setcookie("lin", '1');
		header("Location: index.php");
	}
	
}
if(isset($_REQUEST['log_o']))
{
	setcookie("mycookie","",time()-3600); 
	setcookie("host","",time()-3600);
	setcookie("uname","",time()-3600);
	setcookie("port","",time()-3600);
	setcookie("pass","",time()-3600);
	setcookie("lin","",time()-3600);
	setcookie("path","",time()-3600);
	header("Location: index.php");
}

if($_COOKIE['lin'] != '1')
{
print'
<form action="index.php" method="post">
	<ul class="login">
		<li><label for="Hostname">Hostname</label></li>
        <li><input type="text" id="Hostname" name="host"></li>
        <li><label for="Username">Username</label></li>
        <li><input type="text" id="Username" name="uname"></li>
        <li><label for="Port">Port</label></li>
        <li><input type="text" id="Port" name="port"></li>
        <li><label for="Password">Password</label></li>
        <li><input type="password" id="Password" name="pass"></li>
        <li><input type="submit" value="Login"></li>
        <li><input type="hidden" name="submitted"></li>
	</ul>
</form>';
}
else
{
	print '<form action="index.php" method="post">
			<input type="submit" value="Logout">
			<input type="hidden" name="log_o">';
}

