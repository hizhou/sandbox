<?php
class Request {
	public function getQuery($key, $default = null) {
		return isset($_GET[$key]) ? $_GET[$key] : $default;
	}
	public function getPost($key, $default = null) {
		return isset($_POST[$key]) ? $_POST[$key] : $default;
	}
}
$request = new Request();

$action = $request->getQuery('action');
if ($action == 'print') {
	$sleep = $request->getQuery('sleep', 0);
	$content = $request->getQuery('content', 'nothing');
	
	if ($sleep > 0) sleep($sleep);
	
	echo "document.write('$content <br>')";
} elseif ($action == 'code') {
	$sleep = $request->getQuery('sleep', 0);
	$content = $request->getQuery('content');
	
	if ($sleep > 0) sleep($sleep);
	
	echo $content;
}