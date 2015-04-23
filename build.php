<?php

foreach (scandir(__DIR__ . '/s') as $s) {
	if ($s[0] == '.') continue;
	//echo "$s\n";
	$base = explode('.', $s)[0];
	$_GET['s'] = $base;
	ob_start();
	include 'index_web.php';
	$content = ob_get_clean();

	$content = preg_replace('@\\?s=(\\w+)@', '\\1.html', $content);

	file_put_contents("{$base}.html", $content);
}

copy('principal.html', 'index.html');