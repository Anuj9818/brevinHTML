<?php
header("Content-type: text/css");
require '../../config.php';
?>

body { 
	background-color: #fff;
	margin: 0;
	padding: 0;
	font-size: 12px;
	font-family: tahoma, verdana, sans-serif;
}

#heading1 {
	color:#d80000;
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
}



.navigation ul li a {
	color: #666;
	height: 100%;
	width: 100%;
	display: block;
	text-decoration: none;
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
	border: none;
	background: none;
}



.navigation ul li ul li a {
	color: #0088cc !important;
}



.title h1 {
	color:#4b4b4b;
}



#box {
	padding: 15px;
	border: 1px solid #e1e0e0;
	background: #fff;
	position: relative;
	color: #666;
}



#box h3 {
	margin: 0 0 15px;
	padding: 0 0 10px;
	color: #222;
	border-bottom: 1px dotted #d2d2d2;
}



#box h4 {
	margin: 0 0 15px;
	color: #222;
}



#box h5 {
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
}

#wysiwyg td {
	padding: 0;
	margin: 0;
}



#wysiwyg td {
	padding: 0;
	margin: 0;
}

#wysiwyg a:hover {
	text-decoration:none;
}

label {
	color:#4d4d4d;
}

input, textarea, option, select {
	color:#4d4d4d;
}

a.link1 {
	color:#0264c9;
	text-decoration:underline;
}

a.link1:hover {
	color:#002b58;
	text-decoration:none;
}



#topMenu {
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