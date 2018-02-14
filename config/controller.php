<?php

class ControllerConfig {

	public function __construct(){

		$controller = new Controller;

		$url = isset($_SERVER['REQUEST_URI']) ? ltrim($_SERVER['REQUEST_URI'], '/') : 'index' ;
		$url = rtrim($url, '/');

		echo $url;

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

		$controllername = $url[0].'_Controller';
		$controller = new $controllername;

		if(isset($url[1])){
			if(isset($_GET)){
				$methodname = 'get_'.$url[1];
			}else{
				$methodname = 'post_'.$url[1];
			}
		}else{
			$methodname = 'get_'.$url[0];
			$controller->{$methodname}();
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