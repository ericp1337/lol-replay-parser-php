<?php

abstract class match_mapper
{
    private $_match_id;

    public function set_match_id($match_id)
    {
        $this->_match_id = intval($match_id);

        return $this;
    }

    public function get_match_id()
    {
        return $this->_match_id;
    }

    public function __construct($match_id = null)
    {
        $this->set_match_id($match_id);
    }

    abstract public function load();
}
