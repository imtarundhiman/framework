<?php 

class Index {

	public function __construct(){
		echo 'i am in index controller';
	}

	public function get_abc($args = false){
		print_r($_GET);
		echo 'i am in abc method';
		echo $args;
	}
}
