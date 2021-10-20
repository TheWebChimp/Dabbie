<?php
	/*
		┌┬┐┌─┐┌┐ ┌┐ ┬┌─┐
		 ││├─┤├┴┐├┴┐│├┤
		─┴┘┴ ┴└─┘└─┘┴└─┘

		Connect to the Database with class! (pun intended)
	*/

	namespace Dabbie;

	class DabbieException extends \Exception {

		/**
		 * Constructor
		 * @param string     $message  Exception message
		 * @param \Exception $previous Previous exception
		 */
		function __construct($message = '') {
			parent::__construct('Dabbie Error: ' . $message);
		}
	}
?>