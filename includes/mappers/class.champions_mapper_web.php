<?php
class champions_mapper_web
{
	private $_freeToPlay;
	private $_region;
	
	/**
	 * @param string | region to use for the api call.
	 * @param  bool | if true, only list free to play champions.
	 */
	public function __construct($region = REGION, $freeToPlay = false)
	{
		$this->_region = (string)$region;
		$this->_freeToPlay = (bool)$freeToPlay;
	}
	
	/**
	 * @return array | returns an array of champion objects
	 */
	public function load()
	{
		$request = new request('http://prod.api.pvp.net/api/lol/' . $this->_region . '/v1.1/champion', array('freeToPlay' => $this->_freeToPlay));
		$champions = $request->send();
		$ret = array();
		foreach($champions['champions'] as $champion)
		{
			$tmp = new champion();
			$tmp->set_array($champion);
			$ret[$champion['id']] = $tmp;
		}
		
		return $ret;
	}
}