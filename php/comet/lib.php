<?php
require_once __DIR__ . '/../../sns/vendor/autoload.php';

use Lupa\Module\Chat\Dao\ChatDaoFactory;

function getMessageDao() {
	return ChatDaoFactory::getInstance()->createChatMessageDao();
}

function getPost($key = null, $default = null) {
	if (null === $key) return $_POST;

	return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function getQuery($key = null, $default = null) {
	if (null === $key) return $_GET;

	return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function getParam($key = null, $default = null) {
	if (null === $key) return ($_POST + $_GET);

	return isset($_POST[$key])
	? $_POST[$key]
	: (isset($_GET[$key]) ? $_GET[$key] : $default);
}

function renderJson($data, $isSuccess = true) {
	$responseData = array('success' => $isSuccess);

	if (!$isSuccess) {
		$responseData['message'] = $data;
	} else {
		if (!is_array($data)) $data = array('data' => $data);
		$responseData += $data;
	}

	return json_encode($responseData);
}