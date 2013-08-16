<?php
class hero_mapper_db {
	public function __construct() {
		
	}
	
	/**
	 * Get info about one champion using their key
	 * @param $hero_id int (the hero key for the champion you want to fetch)
	 * @return array
	 */
	public function load($hero_id = null) {
		if(is_null($hero_id)) {
			return false;
		}
		$db = db::obtain();
		$res = $db->query_first_pdo('SELECT * FROM ' . db::real_tablename('champions') . ' WHERE `key` = ?', array($hero_id));
		$hero = new hero();
		$hero->set_array($res);
		return $hero;
	}
	
	/**
	 * Saves Champion info into database inserting or updating depending on if it exists already or not
	 * @param hero object
	 */
	public function save(hero $hero) {
		if(self::hero_exists($hero->get('key'))) {
			$this->update($hero);
		}
		else {
			$this->insert($hero);
		}
	}
	
	private function insert($hero) {
		$db = db::obtain();
		$db->insert_pdo(db::real_tablename('champions'), $hero->get_data_array());
	}
	
	private function update($hero) {
		$db = db::obtain();
		$db->update_pdo(db::real_tablename('champions'), $hero->get_data_array(), array('key' => $hero->get('key')));
	}
	
	public function delete($hero_id) {
		$id = intval($hero_id);
		$db = db::obtain();
		if(!self::hero_exists($id)) {
			return;
		}
		$db->delete_pdo(db::real_tablename('champions'), array('key' => $id));
	}
	
	public static function hero_exists($hero_id) {
		$db = db::obtain();
		$id = intval($hero_id);
		$r = $db->query_first_pdo('SELECT `key` FROM ' . db::real_tablename('champions') . ' WHERE `key` = ?', array($id));
		return ((bool)$r);
	}
}
