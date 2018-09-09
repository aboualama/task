<?php


if(!function_exists('admin')){
	function admin(){
		return auth()->guard('admin');
	}
}



if(!function_exists('first_word')){
	function first_word($string){
		$x = explode(" " , $string);
		return $x[0];
	}
}


if(!function_exists('slug')){
	function slug($string){ 
		return str_replace(' ','-', strtolower($string));
	}
}
/**
 * Return nav-here if current path begins with this path.
 *
 * @param string $path
 * @return string
 */
function setActive($path)
{
    return Request::is($path . '*') ? ' class=menu-active' :  '';
}