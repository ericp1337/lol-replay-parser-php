<?php
class parser {
	private $_json = '';
	
	public function __construct() {
	}
	
	public function load($filename, $assoc = false) {
		$this->_json = '';
		$char = '';
		//read file into a string variable
		$content = file_get_contents($filename);
		//open file using a file-pointer for iterating
		$fh = fopen((string)$filename, "r");
		if($fh) {
			//find where the json object starts & ends
			$pos = strpos($content, '{"gameId"');
			$end = strrpos($content, 'gameLength', $pos);
			//delete the string variable to free memory
			unset($content);
			//find where the last } is so we know when to stop
			fseek($fh, $end);
			while($char != '}') {
				$char = fgetc($fh);
				$end = ftell($fh);
			}
			//go back to where the json starts so we can save & parse it
			fseek($fh, $pos);
			$fp = ftell($fh);
			while($fp != $end) {
				$this->_json .= fgetc($fh);
				$fp = ftell($fh);
			}
		}
		fclose($fh);
		
		return $this;
	}
	
	public function parse() {
		if(is_null($this->_json)) {
			return;
		}
		$match = new match();
		$json = json_decode($this->_json, true);
		$stats = json_decode($json['statsJSON'], true);
		
		$match->set_array($json);
		$i=0;
		foreach($json['participants'] as $p) {
			$slot = new slot();
			foreach($p as $key=>$value) {
				$slot->set($key, $value);
			}
			foreach($stats[$i] as $key=>$value) {
				$slot->set(strtolower($key), $value);
			}
			$match->add_slot($slot);
			$i++;
		}
		$match->set_all_bans($json['bannedChampions']);
		return $match;
	}
}
?>