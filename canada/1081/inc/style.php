<?php
header("Content-type: text/css");
require '../../config.php';
?>
body { 
	background-color: #fff;
	margin: 0;
	padding: 0;
	font-size: 14px;
	font-family: tahoma, verdana, sans-serif;
}

#heading1 {
	font-family: Georgia;
	font-size:12pt;
	font-weight:bold;
	color:#d80000;
	letter-spacing: -1px;
}

/* Sidebar */

#sidebar {
	width: 220px;
	position: relative;
}

/* Navigation */

.navigation {
	margin: 0 0 20px;
	background: #fff;
	border-left: 1px solid #e1e0e0;
	border-right: 1px solid #e1e0e0;
	border-bottom: 1px solid #e1e0e0;
}

.navigation ul {
	margin: 0;
	padding: 0;
	list-style: none;
}

.navigation ul li {
	margin: 0;
	padding: 0 15px;
	border-top: 1px solid #e8e8e8;
	background: url(<?php echo $admin_path; ?>/images/navigation-off.gif) repeat-x;
	line-height: 24px;
	height: 100%;
	display: block;
	font-family: Tahoma, Verdana, sans-serif;
	font-size: 13px;
}

.navigation ul li a {
	color: #666;
	height: 100%;
	width: 100%;
	display: block;
	text-decoration: none;
	font-weight:bold;
}

.navigation ul li a:hover {
	text-decoration: underline;
}

.navigation ul li.active {
	background: url(<?php echo $admin_path; ?>/images/navigation-on.gif) repeat-x;
}

.navigation ul li.active a {
	color: #fff;
}

.navigation ul li ul {
	margin: 5px 0;
}

.navigation ul li ul li {
	margin: 0;
	padding: 0;
	font-size: 11px;
	border: none;
	background: none;
}

.navigation ul li ul li a {
	color: #0088cc !important;
}

.title h1 {
	font-family: Georgia;
	font-size:14pt;
	font-weight:bold;
	color:#4b4b4b;
	letter-spacing: -1px;
}

#box {
	padding: 15px;
	border: 1px solid #e1e0e0;
	background: #fff;
	position: relative;
	font: 12px Helvetica, Arial, sans-serif;
	color: #666;
}

#box h3 {
	margin: 0 0 15px;
	padding: 0 0 10px;
	color: #222;
	font-family: Tahoma, Verdana, sans-serif;
	font-size: 14px;
	border-bottom: 1px dotted #d2d2d2;
}

#box h4 {
	margin: 0 0 15px;
	color: #222;
	font-family: Tahoma, Verdana, sans-serif;
	font-size: 12px;
}

#box h5 {
	font: 12px/14px Arial, Helvetica, sans-serif;
	font-weight: bold;
	padding: 8px 0;
	margin: 0;
	color: #444;
}

#box a {
	color: #0088cc;
	text-decoration:none;
}

#box a:hover {
	color: #016699;
	text-decoration:underline;
}

#box .success {
	color: #008000;
}

#box .error {
	color: #d8122d;
}

#box form {
	padding: 0;
	margin: 0;
	font:normal 8pt Arial;
}

#wysiwyg td {
	padding: 0;
	margin: 0;
	font:normal 8pt Arial;
}

#wysiwyg td {
	padding: 0;
	margin: 0;
	font:normal 8pt Arial;
}

#wysiwyg a:hover {
	text-decoration:none;
}


label {
	font-family: Tahoma, Verdana, sans-serif;
	font-size:10pt;
	font-weight:bold;
	color:#4d4d4d;
}

input, textarea, option, select {
	font-family: tahoma, verdana, sans-serif;
	font-size:9pt;
	color:#4d4d4d;
}

a.link1 {
	font-family: tahoma, verdana, sans-serif;
	color:#0264c9;
	text-decoration:underline;
}
a.link1:hover {
	color:#002b58;
	text-decoration:none;
}

#topMenu {
	font-family: Georgia, Tahoma;
	font-weight: bold;
	font-size: 9pt;
	color: #dcdcdc;
	line-height: 16px;
}

#topMenu a {
	text-decoration: underline;
	color: #e3dc17;
}

#topMenu a:hover {
	text-decoration: none;
	color: #cdc603;
}

#copy {
	font-family: Georgia, Tahoma;
	font-size: 9pt;
	color: #606060;
	line-height: 16px;
}

#copy a {
	text-decoration: underline;
	color: #005f39;
}

#copy a:hover {
	text-decoration: none;
	color: #005f39;
}