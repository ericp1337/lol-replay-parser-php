<?php
class heroes_mapper_db {
	public function __construct() {
	}
	
	/**
	 * Returns an array containing every hero in the database
	 * @return array of hero objects
	 */
	public function load() {
		$db = db::obtain();
		$data = $db->fetch_array_pdo('SELECT * FROM ' . db::real_tablename('champions'), array());
		$r = array();
		foreach($data as $k=>$v) {
			$hero = new hero();
			$hero->set_array($v);
			$r[$hero->get('key')] = $hero;
		}
		return $r;
	}
}
?>