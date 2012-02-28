<?php 
session_start();
ob_start();
	
	
if(isset($_REQUEST['dir']))
{
	$path = $_SESSION['path'];
	if($_REQUEST['dir'] != '..')
	{
		//print "path: ".$path."<br>";
		$new=$_REQUEST['dir'];
		//print "new: ".$new."<br>";
		$exploded = explode('/', $path) or die("ERROR");
		if($exploded[0] == '')
		{
		array_shift($exploded);
		}
		//print "exploded 1: ";print_R($exploded);print "<br>";
		//array_push($exploded,$new) or die("ERROR");
		$exploded[] = $new; 
		//print "exploded 2: ";print_R($exploded);print "<br>";
		$_SESSION['path'] = implode('/',$exploded) or die("ERROR");
	}
	else
	{
		//print "path: ".$path."<br>";
		$exploded = explode('/', $path);
		array_pop($exploded);
		//print "exploded: ";print_R($exploded);print "<br>";
		$_SESSION['path'] = implode('/',$exploded);
	}
}
if(empty($_SESSION['path']))
{
	$_SESSION['path']="/";
}

print $_SESSION['path'];
	
		print '<script>
			function new_path(path123)
			{	
				function createCookie(name,value,days) {
					if (days) {
						var date = new Date();
						date.setTime(date.getTime()+(days*24*60*60*1000));
						var expires = "; expires="+date.toGMTString();
					}
					else var expires = "";
					document.cookie = name+"="+value+expires+"; path=/";
				}
			createCookie("path","",-1);
			createCookie(path,path123,2); 
			alert("setting cookie to "+path);
			}
			</script>';
			
	function cutspaces($str){
		while(substr($str,0,1)==" "){$str=substr($str,1);}
		return $str;
	}
	
	function get_mime_type($file)
{

        // our list of mime types
        $mime_types = array("323" => "text/h323",
			"acx" => "application/internet-property-stream",
			"ai" => "application/postscript",
			"aif" => "audio/x-aiff",
			"aifc" => "audio/x-aiff",
			"aiff" => "audio/x-aiff",
			"asf" => "video/x-ms-asf",
			"asr" => "video/x-ms-asf",
			"asx" => "video/x-ms-asf",
			"au" => "audio/basic",
			"avi" => "video/x-msvideo",
			"axs" => "application/olescript",
			"bas" => "text/plain",
			"bcpio" => "application/x-bcpio",
			"bin" => "application/octet-stream",
			"bmp" => "image/bmp",
			"c" => "text/plain",
			"cat" => "application/vnd.ms-pkiseccat",
			"cdf" => "application/x-cdf",
			"cer" => "application/x-x509-ca-cert",
			"class" => "application/octet-stream",
			"clp" => "application/x-msclip",
			"cmx" => "image/x-cmx",
			"cod" => "image/cis-cod",
			"cpio" => "application/x-cpio",
			"crd" => "application/x-mscardfile",
			"crl" => "application/pkix-crl",
			"crt" => "application/x-x509-ca-cert",
			"csh" => "application/x-csh",
			"css" => "text/css",
			"dcr" => "application/x-director",
			"der" => "application/x-x509-ca-cert",
			"dir" => "application/x-director",
			"dll" => "application/x-msdownload",
			"dms" => "application/octet-stream",
			"doc" => "application/msword",
			"dot" => "application/msword",
			"dvi" => "application/x-dvi",
			"dxr" => "application/x-director",
			"eps" => "application/postscript",
			"etx" => "text/x-setext",
			"evy" => "application/envoy",
			"exe" => "application/octet-stream",
			"fif" => "application/fractals",
			"flr" => "x-world/x-vrml",
			"gif" => "image/gif",
			"gtar" => "application/x-gtar",
			"gz" => "application/x-gzip",
			"h" => "text/plain",
			"hdf" => "application/x-hdf",
			"hlp" => "application/winhlp",
			"hqx" => "application/mac-binhex40",
			"hta" => "application/hta",
			"htc" => "text/x-component",
			"htm" => "text/html",
			"html" => "text/html",
			"htt" => "text/webviewhtml",
			"ico" => "image/x-icon",
			"ief" => "image/ief",
			"iii" => "application/x-iphone",
			"ins" => "application/x-internet-signup",
			"isp" => "application/x-internet-signup",
			"jfif" => "image/pipeg",
			"jpe" => "image/jpeg",
			"jpeg" => "image/jpeg",
			"jpg" => "image/jpeg",
			"js" => "application/x-javascript",
			"latex" => "application/x-latex",
			"lha" => "application/octet-stream",
			"lsf" => "video/x-la-asf",
			"lsx" => "video/x-la-asf",
			"lzh" => "application/octet-stream",
			"m13" => "application/x-msmediaview",
			"m14" => "application/x-msmediaview",
			"m3u" => "audio/x-mpegurl",
			"man" => "application/x-troff-man",
			"mdb" => "application/x-msaccess",
			"me" => "application/x-troff-me",
			"mht" => "message/rfc822",
			"mhtml" => "message/rfc822",
			"mid" => "audio/mid",
			"mny" => "application/x-msmoney",
			"mov" => "video/quicktime",
			"movie" => "video/x-sgi-movie",
			"mp2" => "video/mpeg",
			"mp3" => "audio/mpeg",
			"mpa" => "video/mpeg",
			"mpe" => "video/mpeg",
			"mpeg" => "video/mpeg",
			"mpg" => "video/mpeg",
			"mpp" => "application/vnd.ms-project",
			"mpv2" => "video/mpeg",
			"ms" => "application/x-troff-ms",
			"mvb" => "application/x-msmediaview",
			"nws" => "message/rfc822",
			"oda" => "application/oda",
			"p10" => "application/pkcs10",
			"p12" => "application/x-pkcs12",
			"p7b" => "application/x-pkcs7-certificates",
			"p7c" => "application/x-pkcs7-mime",
			"p7m" => "application/x-pkcs7-mime",
			"p7r" => "application/x-pkcs7-certreqresp",
			"p7s" => "application/x-pkcs7-signature",
			"pbm" => "image/x-portable-bitmap",
			"pdf" => "application/pdf",
			"pfx" => "application/x-pkcs12",
			"pgm" => "image/x-portable-graymap",
			"pko" => "application/ynd.ms-pkipko",
			"pma" => "application/x-perfmon",
			"pmc" => "application/x-perfmon",
			"pml" => "application/x-perfmon",
			"pmr" => "application/x-perfmon",
			"pmw" => "application/x-perfmon",
			"pnm" => "image/x-portable-anymap",
			"png" => "image/png",
			"pot" => "application/vnd.ms-powerpoint",
			"ppm" => "image/x-portable-pixmap",
			"pps" => "application/vnd.ms-powerpoint",
			"ppt" => "application/vnd.ms-powerpoint",
			"prf" => "application/pics-rules",
			"ps" => "application/postscript",
			"pub" => "application/x-mspublisher",
			"qt" => "video/quicktime",
			"ra" => "audio/x-pn-realaudio",
			"ram" => "audio/x-pn-realaudio",
			"ras" => "image/x-cmu-raster",
			"rgb" => "image/x-rgb",
			"rmi" => "audio/mid",
			"roff" => "application/x-troff",
			"rtf" => "application/rtf",
			"rtx" => "text/richtext",
			"scd" => "application/x-msschedule",
			"sct" => "text/scriptlet",
			"setpay" => "application/set-payment-initiation",
			"setreg" => "application/set-registration-initiation",
			"sh" => "application/x-sh",
			"shar" => "application/x-shar",
			"sit" => "application/x-stuffit",
			"snd" => "audio/basic",
			"spc" => "application/x-pkcs7-certificates",
			"spl" => "application/futuresplash",
			"src" => "application/x-wais-source",
			"sst" => "application/vnd.ms-pkicertstore",
			"stl" => "application/vnd.ms-pkistl",
			"stm" => "text/html",
			"svg" => "image/svg+xml",
			"sv4cpio" => "application/x-sv4cpio",
			"sv4crc" => "application/x-sv4crc",
			"t" => "application/x-troff",
			"tar" => "application/x-tar",
			"tcl" => "application/x-tcl",
			"tex" => "application/x-tex",
			"texi" => "application/x-texinfo",
			"texinfo" => "application/x-texinfo",
			"tgz" => "application/x-compressed",
			"tif" => "image/tiff",
			"tiff" => "image/tiff",
			"tr" => "application/x-troff",
			"trm" => "application/x-msterminal",
			"tsv" => "text/tab-separated-values",
			"txt" => "text/plain",
			"uls" => "text/iuls",
			"ustar" => "application/x-ustar",
			"vcf" => "text/x-vcard",
			"vrml" => "x-world/x-vrml",
			"wav" => "audio/x-wav",
			"wcm" => "application/vnd.ms-works",
			"wdb" => "application/vnd.ms-works",
			"wks" => "application/vnd.ms-works",
			"wmf" => "application/x-msmetafile",
			"wps" => "application/vnd.ms-works",
			"wri" => "application/x-mswrite",
			"wrl" => "x-world/x-vrml",
			"wrz" => "x-world/x-vrml",
			"xaf" => "x-world/x-vrml",
			"xbm" => "image/x-xbitmap",
			"xla" => "application/vnd.ms-excel",
			"xlc" => "application/vnd.ms-excel",
			"xlm" => "application/vnd.ms-excel",
			"xls" => "application/vnd.ms-excel",
			"xlt" => "application/vnd.ms-excel",
			"xlw" => "application/vnd.ms-excel",
			"xof" => "x-world/x-vrml",
			"xpm" => "image/x-xpixmap",
			"xwd" => "image/x-xwindowdump",
			"z" => "application/x-compress",
			"zip" => "application/zip");

        $extension = strtolower(end(explode('.',$file)));

        return $mime_types[$extension];
}
	
    set_time_limit(300);//for setting 
	$path = $_SESSION['path'];
	
    $ftp_server=$_COOKIE['host'];
    $ftp_server_port=$_COOKIE['port'];
    $ftp_user_name= $_COOKIE['uname'];
    $ftp_user_pass=$_COOKIE['pass'];

    // set up a connection to ftp server
    $conn_id = ftp_connect($ftp_server, $ftp_server_port); 
    // login with username and password
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

    // check connection and login result
    if ((!$conn_id) || (!$login_result)) { 
        echo "Fail</br>";
    } else {
        echo "Success</br>";
        // enabling passive mode
        ftp_pasv( $conn_id, true );
        // get contents of the current directory
        //$contents = ftp_rawlist($conn_id, $path);

	$list = ftp_rawlist($conn_id, $path);
	$folders=array();
	$files=array();
	for($i=0;$i<sizeof($list);$i++){
		list($permissions,$next)=split(" ",$list[$i],2);
		list($num,$next)=split(" ",cutspaces($next),2);
		list($owner,$next)=split(" ",cutspaces($next),2);
		list($group,$next)=split(" ",cutspaces($next),2);
		list($size,$next)=split(" ",cutspaces($next),2);
		list($month,$next)=split(" ",cutspaces($next),2);
		list($day,$next)=split(" ",cutspaces($next),2);
		list($year_time,$filename)=split(" ",cutspaces($next),2);
		if($filename!="."){
			$filename = array(Perm => $permissions, Num => $num, Owner => $owner, Group => $group, Size => $size, Month => $month, Day => $day, Year => $year_time, Name => $filename);
			if(substr($permissions,0,1)=="d"){
				$folders[]=$filename;
			} else {
				$files[]=$filename;}}}
	sort($folders);
	sort($files);
	
	print '<table class="main"><thead><th>File</th><th>Permissions</th><th>Owner</th><th>Size</th><th>Type</th></thead>';
	foreach($folders as $fold)
	{
		print '<tr>';
		//print "<td><a href=\"#\" onclick=\"new_path('".$fold[Name]."');\">".$fold[Name]."</a></td>";	
		print '<td><form action="http://localhost/Current/DND/" method="post"><input value="'.$fold[Name].'" type="hidden" name="dir"><input type="submit" value="'.$fold[Name].'"></form></td>';
		print '<td>'.$fold[Perm].'</td>';
		print '<td>'.$fold[Owner].'</td>';
		print '<td>'.$fold[Size].'</td>';
		print '<td>Dir</td>';
		print '</tr>';
		
	}
	$num = 1;
	foreach($files as $file)
	{
		$mime = get_mime_type($file[Name]);
		print '<tr>';
		print '<td><a href="#" id="dragout';
		if($num == 1){}
		else{print $num;}
		$num++;
		print '" draggable="true" data-downloadurl="'.$mime.':'.$file[Name].':ftp://'.$ftp_user_name.':%20'.$ftp_user_pass.'@'.$ftp_server.$path.'/'.$file[Name].'">'.$file[Name].'</a></td>';	
		print '<td>'.$file[Perm].'</td>';
		print '<td>'.$file[Owner].'</td>';
		print '<td>'.$file[Size].'</td>';
		print '<td>File</td>';
		print '</tr>';
		
	}
	print '</table>';
	
}
    // close the FTP connection
    ftp_close($conn_id);

$num = $num - 1;
//setcookie("num", $num);
	
print '<script type="text/javascript">
		var files = [';
		$num2=1;
		while($num2 < $num){
			if($num2 == 1){
			print 'document.getElementById("dragout"),';
			}
			else{
			print 'document.getElementById("dragout'.$num2.'"),';
			}
			$num2++;
		}
		print 'document.getElementById("dragout'.$num2.'")';
		print '],
			fileDetails = [];';
		
		// Some forward thinking, utilise the custom data attribute to extend attributes available.
		print 'if(typeof files[0].dataset === "undefined") {';
			// Grab it the old way
		$num2=0;
		while($num2 != $num){
			print 'fileDetails['.$num2.'] = files['.$num2.'].getAttribute("data-downloadurl");';
			$num2++;
			}
			
		
		print' } else {';
			$num2=0;
		while($num2 != $num){
			print 'fileDetails['.$num2.'] = files['.$num2.'].dataset.downloadurl;';
			$num2++;
			}
			
		
		print '}';
		$num2=0;
		while($num2 != $num){
			print 'files['.$num2.'].addEventListener("dragstart",function(evt){
			evt.dataTransfer.setData("DownloadURL",fileDetails['.$num2.']);
		},false);';
		$num2++;
			}
			
		
	print '</script>';
	

	ob_flush();
?>