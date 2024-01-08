<?php

if (!function_exists('dd')) {
	function dd($a)
	{
		var_dump($a);
		die();
	}
}