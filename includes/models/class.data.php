<?php
abstract class data {
	
	const path = 'data';
	
	protected $_data = array();
	
	protected $_field;
	
	protected $_filename;
	
	public function set_field($field) {
		$this->_field = (string)$field;
		return $this;
	}
	
	public function get_field() {
		return $this->_field;
	}
	
	public function set_filename($filename) {
		$this->_filename = (string)$filename;
		return $this;
	}
	
	public function get_filename() {
		return $this->_filename;
	}
	
	public function parse() {
		$fullpath = str_replace('includes', '', config::get('base_path')) . self::path . DIRECTORY_SEPARATOR . $this->_filename;
		if(file_exists($fullpath)) {
			$content = file_get_contents($fullpath);
			$data = json_decode($content);
			$return = array();
			$field = $this->get_field();
			if($field && $data->$field) {
				foreach($data->$field as $obj) {
					$obj_array = (array)$obj;
					$return[$obj_array['id']] = $obj_array;
				}
				$this->_data = $return;
			}
		}
	}
	
	public function set_data(array $data) {
		$this->_data = $data;
		return $this;
	}
	
	public function get_data() {
		return $this->_data;
	}
	
	public function get_data_by_id($id) {
		$id = intval($id);
		if(isset($this->_data[$id])) {
			return $this->_data[$id];
		}
	}
	
	public function get_field_by_id($id, $field_name) {
		$data = $this->get_data_by_id($id);
		if(!is_null($data)) {
			$field_name = (string)$field_name;
			if(isset($data[$field_name])) {
				return $data[$field_name];
			}
		}
		return null;
	}
}
?>