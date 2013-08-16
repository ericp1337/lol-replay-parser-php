<?php
require_once('class.stat_object.php');
class match extends stat_object {
	/**
	 * the numeric game id
	 * @var int
	 */
	protected $_gameId;
	protected $_mapId;
	protected $_gameMode;
	protected $_gameType;
	protected $_gameCreationTime;
	protected $_gameStartTime;
	protected $_platformId;
	protected $_gameTypeConfigId;
	protected $_gameQueueConfigId;
	protected $_interestScore;
	protected $_featuredGame;
	protected $_fileSize;
	protected $_gameVersion;
	protected $_gameLength;
	/**
	 * array of all the players in the match
	 * @var array
	 */
	protected $_participants = array();
	protected $_bannedChampions = array();
	
	public function add_slot(slot $slot) {
		array_push($this->_participants, $slot->get_data_array());
	}
	
	public function set_all_bans(array $data) {
		$this->_bannedChampions = $data;
		return $this;
	}
	
	public function get_all_slots() {
		return $this->_participants;
	}
	
	public function get_bans() {
		return $this->_bannedChampions;
	}
	
	public function __construct() {
	}
}
?>