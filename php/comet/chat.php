<?php 
require_once './lib.php';

$action = getParam('action');

$clientIp = $_SERVER['REMOTE_ADDR'];

if ($action == 'commit') {
	$message = getPost('message');
	$timestamp = time();
	
	//getMessageDao()->add();
	
	echo renderJson(array(
		'timeline' => $timestamp,
		'ip' => $clientIp,
		'message' => $message,
	));
} elseif ($action == 'polling') {
	$after = getParam('after', 0);
	
	set_time_limit(60 * 10);
	
	$wait = 0.8;
	$maxExecSeconds = 5;

	$waitCount = 0;
	$maxWaitTimes = $maxExecSeconds / $wait;
	
	while (true) {
		$rows = array();//getMessageDao()->findAfterId($after);
		if ($rows) {
			foreach ($rows as $k => $row) {
				$rows[$k]['timeline'] = date('Y-m-d_H:i:s', $row['timeline']);
				$rows[$k]['message'] = nl2br(htmlspecialchars($row['message']));
			}
			
			$rowCount = count($rows);
			
			echo renderJson(array(
					'number' => $rowCount, 
					'maxId' => $rows[$rowCount - 1]['id'], 
					'messages' => $rows,
			));
			exit;
		}
		
		
		usleep($wait * 1000 * 1000);
		$waitCount++;
		
		if ($waitCount >= $maxWaitTimes) {
			echo renderJson(array(
					'number' => 0,
					'maxId' => 0,
					'messages' => array(),
			));
			exit;
		}
	}
} else {
	//$maxId = getMessageDao()->getMaxId();
	//if (!$maxId) 
		$maxId = 0;
	
	include './template.htm';
}
