<?php
class match_mapper_db extends match_mapper {
	public function __construct($match_id = null) {
	}
	
	public function load($match_id = null) {
		if(!is_null($match_id)) {
			$this->set_match_id($match_id);
		}
	}
	
	public function save(match $match) {
		if(self::match_exists($match->get('gameId'))) {
			$this->update($match);
		}
		else {
			$this->insert($match);
		}
	}
	
	//to do
	private function update($match, $lazy = true) {
		$db = db::obtain();
	}
	
	private function insert($match) {
		$db = db::obtain();
		$slots = $match->get_all_slots();
		
		//save common match info
		$db->insert_pdo(db::real_tablename('matches'), $match->get_data_array());
		//save account info -- to do later
		foreach($slots as $slot) {
		}
		//save slots (e.g. player stats from match)
		foreach($slots as $slot) {
			$slot_id = $db->insert_pdo(db::real_tablename('slots'), $slot->get_data_array());
		}
		
		//save ban info if bans exist
		//need to finish this function still
		if(!empty($match->get_bans())) {
			$bans = $match->get_bans();
			$data = array();
			foreach($bans as $ban) {
				$data1 = array();
				array_push($data1, $match->get('gameId'));
				array_push($data1, $ban['']);
				array_push($data, $data1);
			}
			//$db->insert_many_pdo(db::real_tablename('bans'), array('gameId'), $data);
		}
	}
	
	/**
	 * Deletes the requested match from the db along with all of the ban and player info for this match
	 * @var int - gameId that you want to delete from the database
	 */
	public function delete($match_id) {
		$match_id = intval($match_id);
		if(!self::match_exists($match_id)) {
			return;
		}
		
		$db = db::obtain();
		$slots = $db->fetch_array_pdo('SELECT id FROM ' . db::real_tablename('slots') . ' WHERE gameId = ?', array($match_id));
		$slots_formatted = array();
		foreach($slots as $slot) {
			array_push($slots_formatted, $slot['id']);
		}
		if(count($slots_formatted)) {
			$slots_str = implode(',', $slots_formatted);
			$db->exec('DELETE FROM ' . db::real_tablename('slots') . ' WHERE id IN(' . $slots_str . ')');
		}
		$db->delete_pdo(db::real_tablename('bans'), array('gameId' => $match_id), 0);
		$db->delete_pdo(db::real_tablename('matches'), array('gameId' => $match_id));
	}
	
	public static function match_exists($match_id = null) {
		if(is_null($match_id)) {
			return;
		}
		
		$match_id = intval($match_id);
		$db = db::obtain();
		$r = $db->query_first_pdo('SELECT gameId FROM ' . db::real_tablename('matches') . ' WHERE gameId = ?', array($match_id));
		return ((bool)$r);
	}
}
?>