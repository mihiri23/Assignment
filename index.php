<?php



	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
        
        echo $uri;
        
	header('Location: '.$uri.'/DTC/Apps/view/login.php');
	exit;
?>
<!--Something is wrong with the XAMPP installation :-( -->
