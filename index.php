<?php
$f = fopen("text.txt", "r"); //���� � �������
$text= fgets($f); 
fclose($f);

	require_once("facebook-sdk/src/facebook.php");
	$config = array();
	
	$config['appId'] = 'appId ����������';
	$config['secret'] = 'secret key ����������';
	$accessToken = "Token ����������";
	
	$config['fileUpload'] = true;
	$fb = new Facebook($config);

	{
		$my_profile = array(
			"access_token" => $accessToken,
			"fields" => "id,name,birthday,education,work"
		);
		
		try {
			$ret = $fb->api('/me', 'GET', $my_profile);
			echo 'Profile Information ::<br><br><pre>';
			print_r($ret);
			echo '</pre>';
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	if(1) {
		$post_new = array(
			"access_token" => $accessToken,
			"message" => "$text",
			"link" => "������", // 
			"picture" => "������ �� ��������",
			"name" => "��� �����",
			"caption" => "��� ������", 
			"description" => "$text"
		);
		
		try {
			$ret = $fb->api('/��� ��/feed', 'POST', $post_new);
			echo 'Successfully posted to Facebook';
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}


?>
