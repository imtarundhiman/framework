<?php 

$config_vars = parse_ini_file(__Dir__.'/../config.conf');

foreach ($config_vars as $name => $value) {
	define(strtoupper($name), $value);
}

?>