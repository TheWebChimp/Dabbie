<?php
	/*
		┌┬┐┌─┐┌┐ ┌┐ ┬┌─┐
		 ││├─┤├┴┐├┴┐│├┤
		─┴┘┴ ┴└─┘└─┘┴└─┘

		Connect to the Database with class! (pun intended)
	*/

	namespace Dabbie;

	use Dabbie\DabbieException;
	use Dabbie\Utils;
	use PDO;

	class Dabbie {

		private $dbh;

		function __construct($settings) {
			global $app;

			$driver = isset($settings['driver']) && $settings['driver'] ? $settings['driver'] : 'mysql';

			if ($driver == 'mysql') {
				try {

					if(!isset($settings['host']) || !isset($settings['user']) || !isset($settings['name']) || !isset($settings['pass'])) {
						throw new DabbieException('Missing host, database name or password');
					}

					$port = isset($settings['port']) ? $settings['port'] : '3306';

					$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8;port=%s', $settings['host'], $settings['name'], $port);
					$this->dbh = new PDO($dsn, $settings['user'], $settings['pass']);
					# Change error and fetch mode
					if ($this->dbh) {
						$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
					}
				} catch (PDOException $e) {
					error_log( $e->getMessage() );
				}
			}
		}

		public function getHandler() {
			return $this->dbh;
		}

		public function query($sql) {

			$stmt = $this->dbh->prepare($sql);
			$stmt->execute();

			return $stmt;
		}
	}
?>