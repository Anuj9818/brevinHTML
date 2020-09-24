<?php
header("Content-type: text/css");
require '../../config.php';
?>
/* Table Style */

.table {
	margin: 0;
	text-align: left;
	border-collapse: collapse;
	font: 12px/14px Arial, Helvetica, sans-serif;
	color: #666;
	border: 1px solid #d2d2d2;
}

.table thead,
.table tfoot {
	background: url(<?php echo $admin_path; ?>/images/background-table.gif) repeat-x;
}

.table th {
	font-weight: bold;
	padding: 5px 8px;
	color: #444;
}

.table th.leftSide {
	font-weight: bold;
	padding: 8px;
	color: #444;
	border-bottom: 1px solid #d2d2d2;
	border-right: 1px dotted #d2d2d2;
}

.table td {
	padding: 8px;
	color: #444;
	border-bottom: 1px solid #d2d2d2;
}

.table td span.active { color: #55a34a;}
.table td span.pending { color: #c5a059;}
.table td span.closed { color: #a02b2b;}

.table .odd {
	background: #f6f6f6; 
}