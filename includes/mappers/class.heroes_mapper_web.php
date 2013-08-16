<?php
class heroes_mapper_web {

	public function __construct() {

	}
	
	private function flatten($a) {
	}

	/**
	 * @return stdObject | detailed hero info
	 */
	public function load() {
		$response = Unirest::get("https://teemojson.p.mashape.com/datadragon/champion", array("X-Mashape-Authorization" => API_KEY));

		$heroes = get_object_vars($response->body->data);
		$r = array();
		foreach($heroes as $k => $v) {
			$tmp = new hero();
			$res[$k] = functions::flatten_array(get_object_vars($v));
			$tmp->set_array($res[$k]);
			$r[$k] = $tmp;
		}
		
		return $r;
	}

}
?>