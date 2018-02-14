<?php

class controller {

	public function __construct(){

		if(!isset($_GET['url'])){
			header('location: index.php?url=index');
		}

		$url = rtrim($_GET['url'], '/');
		$url = explode('/', $url);

		if(!isset($url[0]) || !strlen($url[0])){
			$url[0] = 'index';
		}

		$file = __DIR__.'/../controllers/'.$url[0].'.controller.php';

		if(file_exists($file)){
			require $file;
		}else{
			require __DIR__.'/../controllers/error404.controller.php';
			$url[0] = 'error404';
		}

		$controller = new $url[0];

		if(isset($url[1])){
			if(isset($_GET)){
				$methodname = 'get_'.$url[1];
			}else{
				$methodname = 'post_'.$url[1];
			}
		}

		if(isset($url[2])){
			$controller->{$methodname}($url[2]);
		}else{
			if(isset($url[1])){
				$controller->{$methodname}();
			}
		}
	}
}

?>