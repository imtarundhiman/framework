<?php 


class View {

	public function render($name){
		require (__DIR__.'/../views/'.$name.'.template.php');
	}
}