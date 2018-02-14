<?php 


class Error404_Controller extends Controller{

	public function __construct(){
		parent::__construct();
	} 


	public function get_error404(){
		$this->view->render('/404');
	}
}