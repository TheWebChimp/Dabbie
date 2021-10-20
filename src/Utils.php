<?php
	/*
		┌┬┐┌─┐┌┐ ┌┐ ┬┌─┐
		 ││├─┤├┴┐├┴┐│├┤
		─┴┘┴ ┴└─┘└─┘┴└─┘

		Connect to the Database with class! (pun intended)
	*/

	namespace Dabbie;

	class Utils {

		public static function get_item($var, $key, $default = '') {
			return is_object($var) ?
				( isset( $var->$key ) ? $var->$key : $default ) :
				( isset( $var[$key] ) ? $var[$key] : $default );
		}
	}
?>