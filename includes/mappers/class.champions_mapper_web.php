<?php
class champions_mapper_web
{
	public function __construct()
	{
	}
	
	public function load()
	{
		$request = new request('http://prod.api.pvp.net/api/lol/na/v1.1/champion');
		$champions = $request->send()['champions'];
		$ret = array();
		foreach($champions as $champion)
		{
			$tmp = new hero();
			$tmp->set_array($champion);
			$ret[] = $tmp;
		}
		
		return $ret;
	}
	
	private function flatten($a)
	{
	}
}