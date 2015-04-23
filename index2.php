<?php

date_default_timezone_set('Europe/Madrid');

$show_web = false;
if (time() >= mktime(0, 0, 0, 10, 2, 2010) - 2) $show_web = true;
if (!empty($_REQUEST['BYPASS_TOD'])) {
	setcookie('BYPASS_TOD', 1);
	$show_web = true;
}

if ($show_web) {
	require_once('index_web.php');
	//require_once('index_roll.php');
} else {
	require_once('index_counter.php');
}
