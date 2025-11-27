<?php
/*
 * Copyright (c) 2025 Bloxtor (http://bloxtor.com) and Joao Pinto (http://jplpinto.com)
 * 
 * Multi-licensed: BSD 3-Clause | Apache 2.0 | GNU LGPL v3 | HLNC License (http://bloxtor.com/LICENSE_HLNC.md)
 * Choose one license that best fits your needs.
 *
 * Original PTL Repo: https://github.com/a19836/ptl/
 * Original Bloxtor Repo: https://github.com/a19836/bloxtor
 *
 * YOU ARE NOT AUTHORIZED TO MODIFY OR REMOVE ANY PART OF THIS NOTICE!
 */

function get_lib($str, $type = "php") {
	$root_path = dirname(dirname(dirname(__DIR__))) . "/";
	
	return $root_path . str_replace(".", "/", $str) . "." . $type;
}

function launch_exception(Throwable $exception) {
	$message = $exception->getMessage();
	$problem = isset($exception->problem) ? $exception->problem : null;
	$msg = $message != $problem ? "$message\n$problem" : $problem;
	
	echo "[EXCEPTION] [" . date("Y-m-d H:i:s") . "]: $message\n\n";
	debug_print_backtrace();
	
	return false;
}
?>
