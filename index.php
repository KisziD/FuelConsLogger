<?php
	
	/*
	include $_SERVER['DOCUMENT_ROOT'] . "/PHP/DatabaseConn.php";
	$con = new DatabaseManager();
	$con->ExecuteQuery("asd");
	*/
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/home');
	exit;
?>