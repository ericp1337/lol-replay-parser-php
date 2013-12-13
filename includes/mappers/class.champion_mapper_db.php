<?php
class champion_mapper_db
{
	private $_id;
	
	public function __construct($champion_id = null)
	{
		if(!is_null($champion_id))
			$this->_id = (int)$champion_id;
	}
	
	public function load($champion_id = null)
	{
		if(!is_null($champion_id))
			$this->_id = intval( $champion_id );
		
		$db = db::obtain();
		$champion_query = 'SELECT * FROM ' . db::real_tablename('champions') . ' WHERE id = ?';
		$champion_info = $db->query_first_pdo($champion_query, array($this->get_id()));
		
		$champion = new champion();
		$champion->set_array($champion_info);
		
		return $champion;
	}
	
	public function save(champion $champion)
	{
		if(self::champion_exists($champion->get('id')))
			$this->update($champion);
		else
			$this->insert($champion);
	}
	
	private function update($champion)
	{
		$db = db::obtain();
		$db->update_pdo(db::real_tablename('champions'), $champion->get_data_array(), array('id' => $champion->get('id')));
	}
	
	private function insert($champion)
	{
		$db = db::obtain();
		$db->insert_pdo(db::real_tablename('champions'), $champion->get_data_array());
	}
	
	public static function champion_exists($id)
	{
		$id = intval($id);
		$db = db::obtain();
		$r = $db->query_first_pdo('SELECT id FROM ' . db::real_tablename('champions') . ' WHERE id = ?', array($id));
		
		return ((bool)$r);
	}
	
	private function get_id()
	{
		return $this->_id;
	}
}
?>
