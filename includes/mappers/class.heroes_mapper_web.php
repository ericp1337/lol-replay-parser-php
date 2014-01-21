<?php
class heroes_mapper_web {

	public function __construct() {

	}

	/**
	 * @return stdObject | detailed hero info
	 * @param bool freeToPlay | Optional filter param to retrieve only free to play champions.
	 */
	public function load($freeToPlay = false) {
		$request = new request('https://prod.api.pvp.net/api/lol/na/v1.1/champion', array('freeToPlay' => $freeToPlay));
		$heroes = $request->send();
		$heroes = $heroes['champions'];

		$r = array();
		foreach ($heroes as $k => $v) {
			$tmp = new hero();
			$tmp->set_array($v);
			$r[$tmp->get('id')] = $tmp;
			//set champion id as array id
		}

		return $r;
	}

}
?>