<?php
$f = fopen("text.txt", "r"); //фаил с текстом
$text= fgets($f); 
fclose($f);

	require_once("facebook-sdk/src/facebook.php");
	$config = array();
	
	$config['appId'] = 'appId приложения';
	$config['secret'] = 'secret key приложения';
	$accessToken = "Token приложения";
	
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
			"link" => "ссылка", // 
			"picture" => "ссылка на картинку",
			"name" => "имя поста",
			"caption" => "имя ссылки", 
			"description" => "$text"
		);
		
		try {
			$ret = $fb->api('/ваш ид/feed', 'POST', $post_new);
			echo 'Successfully posted to Facebook';
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}


?>
