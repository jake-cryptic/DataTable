<?php

include('DataTable.php');

function out($in) {
	switch (gettype($in)) {
		case "string":
			if (strlen($in) === 0) return "No data.";
			return $in;
			break;
		case "array":
			return implode(' ', $in);
			break;
		case 'NULL':
			return 'Unknown';
		case 'boolean':
			return $in ? "True" : "False";
		default:
			return 'Null';
			break;
	}
}

$ex = 'fitbit';
if (!empty($_GET['ex'])) {
	$ex = stripslashes(htmlspecialchars($_GET['ex']));
}
$fp = 'examples/' . $ex . '.php';
include($fp);