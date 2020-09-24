<?php
function adminPagination($reload, $page, $tpages, $adjacents) {

	/*************************************************************************
	php easy :: pagination scripts set - Version Three
	==========================================================================
	Author:      php easy code, www.phpeasycode.com
	Web Site:    http://www.phpeasycode.com
	Contact:     webmaster@phpeasycode.com
	*************************************************************************/
	
	$prevlabel = "&lsaquo; Prev";
	$nextlabel = "Next &rsaquo;";
	
	$out = "<div class=\"pagin\">\n";
	
	// previous
	if($page==1) {
		$out.= "<span>" . $prevlabel . "</span>\n";
	}
	elseif($page==2) {
		$out.= "<a href=\"" . $reload . "\">" . $prevlabel . "</a>\n";
	}
	else {
		$out.= "<a href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a>\n";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<a href=\"" . $reload . "\">1</a>\n";
	}
	
	// interval
	if($page>($adjacents+2)) {
		$out.= "...\n";
	}
	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<span class=\"current\">" . $i . "</span>\n";
		}
		elseif($i==1) {
			$out.= "<a href=\"" . $reload . "\">" . $i . "</a>\n";
		}
		else {
			$out.= "<a href=\"" . $reload . "&amp;page=" . $i . "\">" . $i . "</a>\n";
		}
	}
	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "...\n";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<a href=\"" . $reload . "&amp;page=" . $tpages . "\">" . $tpages . "</a>\n";
	}
	
	// next
	if($page<$tpages) {
		$out.= "<a href=\"" . $reload . "&amp;page=" . ($page+1) . "\">" . $nextlabel . "</a>\n";
	}
	else {
		$out.= "<span>" . $nextlabel . "</span>\n";
	}
	
	$out.= "</div>";
	
	return $out;
}

function getFileExtension($filename) {
	$extension=strtolower(substr($filename, strrpos($filename, '.') + 1));
	return $extension;
}

function makeRandomPassword($length="5", $showDateTime="") {
  $salt = "abchefghjkmnpqrstuvwxyz0123456789";
  srand((double)microtime()*1000); 
	$i = 0;
	while ($i <= $length) {
			$num = rand() % 33;
			$tmp = substr($salt, $num, 1);
			$pass = $pass . $tmp;
			$i++;
	}
	
	if ($showDateTime==1) {
		$dateTime=date("ymdHis");
	} else {
		$dateTime="";
	}
	return $dateTime.$pass;
}
function getIp () {
	$ip = false;
	if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
	 $ip = $_SERVER['HTTP_CLIENT_IP'];
	}

	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	 $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
	 if($ip) {
		 array_unshift($ips, $ip);
		 $ip = false;
	 }
	 
	 for($i = 0; $i < count($ips); $i++) {
		 if(!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) {
			 if(version_compare(phpversion(), "5.0.0", ">=")) {
				 if(ip2long($ips[$i]) != false) {
					 $ip = $ips[$i];
					 break;
				 }
			 } else {
				 if(ip2long($ips[$i]) != - 1) {
					 $ip = $ips[$i];
					 break;
				 }
			 }
		 }
	 }
	}
	$finalip=$ip ? $ip : $_SERVER['REMOTE_ADDR'];
	return $finalip;
}
function resizeImage_GD2($forcedwidth, $forcedheight, $sourcefile, $destfile) {
	$fw=$forcedwidth;
	$fh=$forcedheight;
	$is=getimagesize($sourcefile);
	
	/* if($is[0]>=$is[1]) {
		$orientation=0;
	} else {
		$orientation=1;
		$fw=$forcedheight;
		$fh=$forcedwidth;
	} */
	
	if ($is[0]>$fw || $is[1]>$fh) {
		
		if(($is[0]-$fw)>=($is[1]-$fh)) {
			$iw=$fw;
			$ih=($fw/$is[0])*$is[1];
		} else {
			$ih=$fh;
			$iw=($ih/$is[1])*$is[0];
		}
		
		$t = 1;

	} else {
		$iw=$is[0];
		$ih=$is[1];
		$t=2;
	}

	if ($t==1) {
		$img_src=imagecreatefromjpeg($sourcefile);
		$img_dst=imagecreatetruecolor($iw,$ih);
		imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $iw, $ih, $is[0], $is[1]);
		
		if(!imagejpeg($img_dst, $destfile, 90)) {
			exit( );
		}
	} else if ($t==2) {
		copy($sourcefile, $destfile);
	}
}
?>