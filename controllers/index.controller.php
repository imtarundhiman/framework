<?php 

class Index_Controller extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function get_index(){
		$this->view->render('/index');
	}

	public function get_abc($args = false){
		print_r($_GET);
		echo 'i am in abc method';
		echo $args;
	}
}
